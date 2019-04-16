<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\UserProfile;
use App\Category;
use App\Product;
use App\Cart;
use App\Wishlist;
use App\Comment;
use App\Reply;
use App\Transaction;

class AllSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //data role
        $roleAdmin = new Role();
        $roleAdmin->name = 'Admin';
        $roleAdmin->description = 'Akses Admin';
        $roleAdmin->save();

        $roleUser = new Role();
        $roleUser->name = 'User';
        $roleUser->description = 'Akses User';
        $roleUser->save();

        //data user admin
        $user = new User();
        $user->email = 'im.kilamieaz@gmail.com';
        $user->password = bcrypt('password');
        $user->role_id = $roleAdmin->id;
        $user->save();

        $user_profile = new UserProfile();
        $user_profile->user_id = $user->id;
        $user_profile->first_name = 'sultan';
        $user_profile->last_name = 'last';
        $user_profile->address = 'lorem ipsum';
        $user_profile->phone_number = '0820123';
        $user_profile->save();

        //data user
        factory(User::class, 5)->create([
            'role_id' => $roleUser->id
        ])->each(function ($user) {
            //data user profile
            $user->userProfile()->save(factory(UserProfile::class)->make([
                'user_id' => $user->id,
            ]));
            //data category
            factory(Category::class, 5)->create()->each(function ($category) use ($user) {
                $product = $category->products()->save(factory(Product::class)->create([
                    'category_id' => $category->id,
                ]));
                factory(Cart::class)->create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                ]);
                factory(Wishlist::class)->create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                ]);
                factory(Transaction::class)->create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                ]);
                factory(Comment::class)->create([
                    'user_id' => $user->id,
                    'product_id' => $product->id,
                ])->each(function ($comment) use ($user, $product) {
                    factory(Reply::class)->create([
                        'user_id' => $user->id,
                        'product_id' => $product->id,
                        'comment_id' => $comment->id,
                    ]);
                });
            });
        });
    }
}
