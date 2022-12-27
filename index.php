<?php 
    session_start();

    require_once 'helper/helper_functions.php';

    is_auth_user(false, true);

    require_once 'database/Database.php';
    require_once 'app/User.php';
    require_once 'app/Post.php';

    $posts = (new Post())->getPosts() ?: [];

    /*
    $yuser = new User([
        'name' => 'yuser',
        'email' => 'yuser@arab.tk',
        'username' => 'yuser99',
        'password' => '123123123'
    ]);*/
    
    // $fadi = new User([], 9);
    
    /*
    
    $users = (new User())->getUsers();

    $lena = $users[0];
    $sajeda = $users[1];
    $sura = $users[2];
    $fadi = $users[3];

    echo $lena->email . "<br />";
    echo $sajeda->email . "<br />";
    echo $sura->email . "<br />";
    echo $fadi->email . "<br />";*/

?>













<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facebook</title>

    <link rel="stylesheet" href="style.css">
</head>

<body class="h-screen flex justify-center" style="background: #edf2f7;">


    <div>
        <div class="mt-8 mb-4">
            <a href="/facebook/post_form.php" class="bg-blue-700 text-white py-2 px-2 tracking-wider rounded-sm">
                Create Post
            </a>
        </div>
        <!-- NEW POST -->
        <?php if(sizeof($posts) == 0) { ?>
            <div>
                <h1>
                    No Posts Yet!
                </h1>
            </div>
        <?php } else { ?>
            <?php foreach($posts as $post) { ?>
            <div class="mt-3 px-5 py-4 bg-white dark:bg-gray-800 shadow rounded-lg max-w-lg">
                <div class="flex mb-4">
                    <img class="w-12 h-12 rounded-full" src="images/profile.png" />
                    <div class="ml-2 mt-0.5">
                        <span class="block font-medium text-base leading-snug text-black dark:text-gray-100">
                            <?php echo (new User([], $post->userId))->name; ?>
                        </span>
                        <span class="block text-sm text-gray-500 dark:text-gray-400 font-light leading-snug">
                            <?php echo $post->getCreatedAt(); ?>
                        </span>
                    </div>
                </div>
                <p class="font-semibold">
                    <?php echo $post->title; ?>
                </p>
                <p class="text-gray-800 dark:text-gray-100 leading-snug md:leading-normal">
                    <?php echo $post->content; ?>
                </p>
                <div class="flex justify-between items-center mt-5">
                    <div class="flex ">
                        <svg class="p-0.5 h-6 w-6 rounded-full z-20 bg-white dark:bg-gray-800 " xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' viewBox='0 0 16 16'>
                            <defs>
                                <linearGradient id='a1' x1='50%' x2='50%' y1='0%' y2='100%'>
                                    <stop offset='0%' stop-color='#18AFFF' />
                                    <stop offset='100%' stop-color='#0062DF' />
                                </linearGradient>
                                <filter id='c1' width='118.8%' height='118.8%' x='-9.4%' y='-9.4%' filterUnits='objectBoundingBox'>
                                    <feGaussianBlur in='SourceAlpha' result='shadowBlurInner1' stdDeviation='1' />
                                    <feOffset dy='-1' in='shadowBlurInner1' result='shadowOffsetInner1' />
                                    <feComposite in='shadowOffsetInner1' in2='SourceAlpha' k2='-1' k3='1' operator='arithmetic' result='shadowInnerInner1' />
                                    <feColorMatrix in='shadowInnerInner1' values='0 0 0 0 0 0 0 0 0 0.299356041 0 0 0 0 0.681187726 0 0 0 0.3495684 0' />
                                </filter>
                                <path id='b1' d='M8 0a8 8 0 00-8 8 8 8 0 1016 0 8 8 0 00-8-8z' />
                            </defs>
                            <g fill='none'>
                                <use fill='url(#a1)' xlink:href='#b1' />
                                <use fill='black' filter='url(#c1)' xlink:href='#b1' />
                                <path fill='white' d='M12.162 7.338c.176.123.338.245.338.674 0 .43-.229.604-.474.725a.73.73 0 01.089.546c-.077.344-.392.611-.672.69.121.194.159.385.015.62-.185.295-.346.407-1.058.407H7.5c-.988 0-1.5-.546-1.5-1V7.665c0-1.23 1.467-2.275 1.467-3.13L7.361 3.47c-.005-.065.008-.224.058-.27.08-.079.301-.2.635-.2.218 0 .363.041.534.123.581.277.732.978.732 1.542 0 .271-.414 1.083-.47 1.364 0 0 .867-.192 1.879-.199 1.061-.006 1.749.19 1.749.842 0 .261-.219.523-.316.666zM3.6 7h.8a.6.6 0 01.6.6v3.8a.6.6 0 01-.6.6h-.8a.6.6 0 01-.6-.6V7.6a.6.6 0 01.6-.6z' />
                            </g>
                        </svg>
                        <span class="ml-1 text-gray-500 dark:text-gray-400  font-light">-</span>
                    </div>
                    <div class="ml-1 text-gray-500 dark:text-gray-400 font-light">
                        <a href="/facebook/comments.php?post_id=3">
                            0 comments
                        </a>
                    </div>
                </div>
            </div>
            <?php }} ?>
    </div>



</body>


</html>