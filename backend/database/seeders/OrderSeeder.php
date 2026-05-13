<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\Product;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $restaurants = Restaurant::all();
        $clients = User::where('role', 'client')->get();

        foreach ($restaurants as $restaurant) {

            // 30 commandes par restaurant
            for ($i = 0; $i < 30; $i++) {

                $client = $clients->random();

                $order = Order::create([
                    'restaurant_id' => $restaurant->id,
                    'user_id' => $client->id,
                    'status' => 'en_attente',
                    'total_price' => 0,
                ]);

                $total = 0;

                $itemsCount = rand(1, 4);

                $products = Product::where('restaurant_id', $restaurant->id)->get();

                for ($j = 0; $j < $itemsCount; $j++) {

                    $product = $products->random();

                    $quantity = rand(1, 3);
                    $price = $product->price;

                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantite' => $quantity,
                        'prix_unitaire' => $price,
                    ]);

                    $total += $price * $quantity;
                }

                $order->update([
                    'total_price' => $total
                ]);
            }
        }
    }
}