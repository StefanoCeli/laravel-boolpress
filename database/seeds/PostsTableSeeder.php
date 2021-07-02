<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i <20 ; $i++) { 
            
            $new_post = new Post();
            $new_post->title = 'Titolo post ' . ($i+1);
            $new_post->slug = Str::slug($new_post->title,'-');
            $new_post->content = ($i+1) . 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque qui cupiditate maxime molestias adipisci eum blanditiis autem magni ad numquam laboriosam, quam libero optio voluptatum tempora minus rem consequatur impedit modi expedita quidem facilis exercitationem! Assumenda obcaecati voluptatem repudiandae incidunt reiciendis sunt nulla, quia itaque dolor inventore cupiditate provident cumque similique dolore quos, quidem debitis quo blanditiis facere ipsum illo veniam porro reprehenderit est! Quibusdam, iste asperiores animi odio eius reprehenderit cumque ab nobis dolorum laboriosam deleniti numquam at incidunt quasi optio nemo, eos error sint sunt, nam eveniet suscipit. Dolore fuga quae ex unde nihil in sunt laudantium velit!';
            $new_post->save();

        }
        
    }
}
