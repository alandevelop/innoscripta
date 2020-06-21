<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsAndCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = [
            ['name'=>'Popular'],
            ['name'=>'Premium'],
            ['name'=>'Classic'],
        ];

        $productsPopular = [
            [   'name'=> 'Supreme',
                'description'=> 'Traditional crust brushed with garlic butter and topped with tomato sauce, 100% real cheese, pepperoni, beef, sausage, red onions, green peppers and mushrooms.',
                'price' => 11,
                'category_id' => 1,
                'img' => '/products/f7011a11-9c35-4428-a68a-d0c51ac3e538.jpg'
            ],
            [   'name'=> 'Veggie',
                'description'=> 'Traditional crust brushed with garlic butter and topped with tomato sauce, 100% real cheese, red onions, green peppers, mushrooms and black olives.',
                'price' => 9,
                'category_id' => 1,
                'img' => '/products/f57b939a4455453daade38016f61d766_292x292.jpeg'
            ],
            [   'name'=> 'Pepperoni & Jalapeno',
                'description'=> 'Traditional crust brushed with garlic butter and topped with tomato sauce, 100% real cheese, pepperoni and jalapeño.',
                'price' => 20,
                'category_id' => 1,
                'img' => '/products/f035c7f46c0844069722f2bb3ee9f113_292x292.jpeg'
            ],
            [   'name'=> 'Cheese',
                'description'=> 'Traditional crust brushed with garlic butter and topped with tomato sauce and 100% real cheese',
                'price' => 32,
                'category_id' => 1,
                'img' => '/products/f4c69cd6-f8ba-4454-b493-a993a4be73cd.jpg'
            ],
            [   'name'=> 'Spinach Alfredo',
                'description'=> 'Traditional crust brushed with garlic butter and topped with creamy Alfredo sauce blended with spinach and 100% real cheese.',
                'price' => 22,
                'category_id' => 1,
                'img' => '/products/ecd9d5b3-0cfc-4138-9559-18d9631fe8aa.jpg'
            ],
            [   'name'=> 'Beef',
                'description'=> 'Traditional crust brushed with garlic butter and topped with tomato sauce, 100% real cheese and beef.',
                'price' => 15,
                'category_id' => 1,
                'img' => '/products/dd59dcd5-cbf7-44e9-a5bd-1654ef06e6a3.jpg'
            ],
            [   'name'=> 'Sausage',
                'description'=> 'Traditional crust brushed with garlic butter and topped with tomato sauce, 100% real cheese and sausage.',
                'price' => 9,
                'category_id' => 1,
                'img' => '/products/dcc14f3c-0bcd-4e22-9c94-d694750a790b.jpg'
            ],
            [   'name'=> 'Hawaiian',
                'description'=> 'Traditional crust brushed with garlic butter and topped with tomato sauce, 100% real cheese, ham and pineapple.',
                'price' => 18,
                'category_id' => 1,
                'img' => '/products/da60bf3d-c89b-4b3a-a0a7-61c4cd8f6a40.jpg'
            ],
        ];

        $productsPremium = [
            [   'name'=> 'Zesty Ham & Cheddar',
                'description'=> 'Traditional crust brushed with garlic butter and topped with Zesty Parmesan Ranch sauce, 100% real cheese, 100% real cheddar and ham.',
                'price' => 9,
                'category_id' => 2,
                'img' => '/products/c7dae007-a646-49da-9240-d0d164be662c.jpg'
            ],
            [   'name'=> 'BBQ Pork',
                'description'=> 'Traditional crust brushed with garlic butter and topped sweet and tangy honey BBQ sauce, 100% real cheese, and deliciously seasoned pulled pork.',
                'price' => 28,
                'category_id' => 2,
                'img' => '/products/c2da53ec-00e2-4446-a4e6-74b83ed0b357.jpg'
            ],
            [   'name'=> 'Zesty Veggie',
                'description'=> 'Traditional crust brushed with garlic butter and topped with Zesty Parmesan Ranch sauce, 100% real cheddar cheese, mushrooms, red onions, green peppers, tomatoes and Parmesan oregano seasoning.',
                'price' => 25,
                'category_id' => 2,
                'img' => '/products/baf084f4-fc94-443c-a646-fdeff9f301a6.jpg'
            ],
            [   'name'=> 'Zesty Pepperoni',
                'description'=> 'Traditional crust brushed with garlic butter and topped with Zesty Parmesan Ranch sauce, 100% real cheese and pepperoni.',
                'price' => 10,
                'category_id' => 2,
                'img' => '/products/b952eb17-77b8-4a14-b982-42fbf5ceaf0e.jpg'
            ],
            [   'name'=> 'Mac & Cheese Premium',
                'description'=> 'Traditional crust brushed with garlic butter and topped with 100% real cheese and Cicis signature macaroni & cheese.',
                'price' => 17,
                'category_id' => 2,
                'img' => '/products/b61cca95-caa6-4952-94b2-6896098b4f53.jpg'
            ],
        ];

        $productsClassic = [
            [   'name'=> 'Chicken Bacon Club',
                'description'=> 'Crispy flatbread crust topped with 100% Real Cheddar Cheese, Premium Chicken, Bacon and Bruschetta Tomatoes with zesty Parmesan Ranch.',
                'price' => 18,
                'category_id' => 3,
                'img' => '/products/b1ffa66f2ebb4e959122e54eaa071109_292x292.jpeg'
            ],
            [   'name'=> 'Honey BBQ Chicken',
                'description'=> 'Crispy flatbread crust topped with 100% Real Cheddar Cheese, Premium Chicken and Sliced Red Onion drizzled with our new Honey BBQ Sauce.',
                'price' => 23,
                'category_id' => 3,
                'img' => '/products/accc2ec9-5a93-4fb4-94bf-9006ce23fede.jpg'
            ],
            [   'name'=> 'Spinach Alfredo',
                'description'=> 'Spinach blended with creamy Alfredo Sauce topped with 100% Real Cheese on crispy flatbread crust.',
                'price' => 14,
                'category_id' => 3,
                'img' => '/products/ac08a6eb-a136-4e76-83bc-bdd5253ff123.jpg'
            ],
            [   'name'=> 'Cheese',
                'description'=> 'Simpler is better. Crispy flatbread crust topped with 100% Real Cheddar Cheese.',
                'price' => 11,
                'category_id' => 3,
                'img' => '/products/a89a7652-0f1f-4286-b41b-ef4c14c98331.jpg'
            ],
        ];

        DB::table('categories')->insert($categories);
        DB::table('products')->insert(array_merge($productsPopular, $productsPremium, $productsClassic));
    }
}
