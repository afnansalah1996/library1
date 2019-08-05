<?php

use Illuminate\Database\Seeder;
use App\Link;

class LinksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // First Menu Blade & Pages
                $link = Link::create(['title'=>'Home','url'=>'/home', 'parent_id'=>0,'show_in_menu'=>1,'order_id'=>1]);
                // First Menu Blade & Pages childrens


                // Second Send To View
                $link = Link::create(['title'=>'Catrgory','parent_id'=>0,'show_in_menu'=>1,'order_id'=>1]);
                Link::create(['title'=>'Religious','url'=>'/category/7', 'route'=>'Religious','parent_id'=>$link->id]);
                Link::create(['title'=>'Politician','url'=>'/category/4', 'route'=>'Politician','parent_id'=>$link->id]);
                Link::create(['title'=>'Social','url'=>'/category/5', 'route'=>'Social','parent_id'=>$link->id]);
                Link::create(['title'=>'Economic','url'=>'/category/6', 'route'=>'Economic','parent_id'=>$link->id]);
                Link::create(['title'=>'Sports','url'=>'/category/8', 'route'=>'Sports','parent_id'=>$link->id]);
                Link::create(['title'=>'Local','url'=>'/category/9', 'route'=>'Local','parent_id'=>$link->id]);
                Link::create(['title'=>'International','url'=>'/category/10', 'route'=>'International','parent_id'=>$link->id]);
                Link::create(['title'=>'Artistic','url'=>'/category/11', 'route'=>'Artistic','parent_id'=>$link->id]);
                Link::create(['title'=>'News','url'=>'/category/12', 'route'=>'News','parent_id'=>$link->id]);

                // Third Database

                $link = Link::create(['title'=>'Login','url'=>'/login', 'parent_id'=>0,'show_in_menu'=>1,'order_id'=>1]);

                $link = Link::create(['title'=>'Register','url'=>'/register', 'parent_id'=>0,'show_in_menu'=>1,'order_id'=>1]);

                $link = Link::create(['title'=>'Contact','url'=>'users/contact', 'parent_id'=>0,'show_in_menu'=>1,'order_id'=>1]);

            }
    }
