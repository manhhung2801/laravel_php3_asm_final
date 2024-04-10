<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductVariantItem;
use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request){
        $product = Product::findOrFail($request->product_id);
        $variants = [];
        $variantTotalAmount = 0;

        if($request->has('variants_items')){
            foreach($request->variants_items as $item_id) {
                $variantItem = ProductVariantItem::find($item_id);
                $variants[$variantItem->productVariant->name]['name'] = $variantItem->name;
                $variants[$variantItem->productVariant->name]['price'] = $variantItem->price;
                $variantTotalAmount += $variantItem->price;
            }
        }

        $productPrice = 0;
        $productPrice = $product->price;

        $cartData = [];
        $cartData['id'] = $product->id;
        $cartData['name'] = $product->name;
        $cartData['qty'] = $request->quantity;
        $cartData['price'] = $productPrice;
        $cartData['weight'] = 10;
        $cartData['options']['variants'] = $variants;
        $cartData['options']['variants_total'] = $variantTotalAmount;
        $cartData['options']['image'] = $product->thumb_image;
        Cart::add($cartData);

        return response(['status' => 'success', 'message' => 'Added to cart success']);
    }

    public function showCart() {
        $cartItems = Cart::content();
        $vouchers = Voucher::all();
        return view('frontend.cart', compact('cartItems', 'vouchers'));
    }

    /** update product Quantity */
    public function updateProductQty(Request $request) {

        Cart::update($request->rowId, $request->quantity);
        $productTotal = $this->getProductTotal($request->rowId);

        return response(['status' => 'success', 'message' => 'Product Quantity Updated.', 'product_total' => $productTotal, 'total' => $this->total()]);

    }

    /** get product total */
    public function getProductTotal($rowId) {
        $product = Cart::get($rowId);
        $total = ($product->price + $product->options->variants_total) * $product->qty;
        return $total;
    }

    /** Clear all Cart product */

    public function clearCart() {
        Cart::destroy();

        return response(['status' => 'success', 'message' => 'Cart cleared successfully']);
    }

    /** remove product from cart*/
    public function removeProduct($rowId) {
        Cart::remove($rowId);
        return redirect()->back();
    }

    /** get cart count */
    public function getCartCount() {
        return Cart::content()->count();
    }


    // total cart
    public function total(){
        $total = 0;
        foreach (Cart::content() as $product) {
            $total += ($product->price + $product->options->variants_total) * $product->qty;
        }
        return $total ;
    }

    /** Apply voucher */

    public function applyVoucher(Request $request) {
        if($request->voucher_code === null) {
            return response(['status' => 'error', 'message' => 'Voucher filed is required']);
        }


        $voucher = Voucher::where('code', $request->voucher_code)->first();

        $totalApplyVoucher = $this->total() - $voucher->discount;


        session(['totalApplyVoucher' => $totalApplyVoucher, 'applyVoucher' => $voucher]);
        return response(['status' => 'success', 'message' => 'Voucher apply successfully','voucher' => $voucher, 'total_apply_voucher' => $totalApplyVoucher]);
    }

}
