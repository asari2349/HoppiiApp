<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{ asset('/icon.ico') }}">

        <title>法政大学授業評価掲示板ログイン</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="fixed top-0 right-0 px-6 py-4 block">
                    <div class="text-sm text-gray-700 dark:text-gray-500 my-1">法政大学授業評価掲示板ログイン</div>
                    @auth
                        <a href="{{ route('index') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">統合認証(SSO)</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">統合認証(SSO)</a>
                        

                        <!--@if (Route::has('register'))-->
                        <!--    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>-->
                        <!--@endif-->
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg width="192" height="192" viewBox="0.00 0.00 585.00 579.00" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g stroke-linecap="round" transform="translate(-34.00, -42.00)">
                        <path d="M109.50,217.48 C110.69,223.77 113.23,237.15 114.58,244.25 C115.85,251.40 119.39,261.96 121.59,265.20 C121.59,265.20 124.26,268.81 124.26,268.81 C125.54,270.43 129.17,273.56 132.43,275.68 C135.33,277.55 140.80,279.71 143.55,280.42 C150.61,282.21 164.14,282.50 171.51,281.84 C180.75,280.97 233.87,268.39 241.15,266.67" fill="none" stroke="rgb(255, 71, 33)" stroke-width="40.00" stroke-opacity="1.00" stroke-linejoin="round"/>
                        <path d="M241.15,266.67 C227.38,269.93 200.18,276.32 186.76,279.45 C182.31,280.40 168.74,282.17 163.96,282.36 C163.96,282.36 165.40,282.30 165.40,282.30" fill="none" stroke="rgb(255, 71, 33)" stroke-width="40.00" stroke-opacity="1.00" stroke-linejoin="round"/>
                        <path d="M241.93,265.87 C220.03,288.15 176.46,332.48 154.79,354.53 C131.54,378.19 84.52,426.02 60.75,450.21 C57.09,453.94 52.82,458.28 52.22,458.89" fill="none" stroke="rgb(255, 71, 33)" stroke-width="40.00" stroke-opacity="1.00" stroke-linejoin="round"/>
                        <path d="M54.35,450.02 C60.57,424.05 75.27,362.73 83.74,327.36 C92.40,291.22 105.53,236.43 110.00,217.78" fill="none" stroke="rgb(255, 71, 33)" stroke-width="40.00" stroke-opacity="1.00" stroke-linejoin="round"/>
                        <path d="M209.84,459.98 C227.78,441.59 272.04,396.21 298.36,369.23 C319.44,347.62 362.89,303.07 385.27,280.14 C408.87,255.94 456.90,206.70 481.32,181.67 C503.52,158.91 546.67,114.67 567.62,93.20 C576.86,83.73 593.05,67.13 600.00,60.00" fill="none" stroke="rgb(255, 71, 33)" stroke-width="40.00" stroke-opacity="1.00" stroke-linejoin="round"/>
                        <path d="M598.83,67.43 C594.80,92.62 585.07,153.62 579.35,189.43 C574.26,221.30 564.47,282.63 559.77,312.09 C554.50,345.12 543.84,411.88 538.46,445.60 C533.22,478.40 522.68,544.42 517.38,577.64 C515.52,589.26 513.21,603.73 512.76,606.58" fill="none" stroke="rgb(255, 71, 33)" stroke-width="40.00" stroke-opacity="1.00" stroke-linejoin="round"/>
                        <path d="M513.86,599.65 C513.86,599.65 532.01,485.95 532.01,485.95" fill="none" stroke="rgb(255, 71, 33)" stroke-width="40.00" stroke-opacity="1.00" stroke-linejoin="round"/>
                        <path d="M218.25,463.33 C247.67,457.78 324.41,443.34 337.62,441.84 C347.93,440.78 355.98,440.39 367.14,440.20 C376.11,440.15 390.47,441.31 392.97,441.65 C396.46,442.13 415.24,446.13 420.23,447.87 C426.26,449.98 436.61,454.62 441.57,457.60 C447.69,461.31 457.85,469.23 462.40,474.01 C467.86,479.76 475.85,490.74 479.12,496.81 C482.97,504.01 487.81,515.56 489.93,522.56 C498.01,550.78 509.42,590.74 512.76,602.47" fill="none" stroke="rgb(255, 71, 33)" stroke-width="40.00" stroke-opacity="1.00" stroke-linejoin="round"/>
                        </g>
                    </svg>
                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">このサイトについて</div>
                        </div>

                        <div class="ml-12">
                            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                このサイトは、法政大学生のみが投稿できる授業評価サイトです。hoppiiから履修情報を取得し、本登録している授業の未評価することができます。<br>
                                また、管理者の都合上2025年度以降はログインできなくなるため、一部のメンテナンスができなくなります。学生の方で権限を引き継ぎたい方はgithub(https://github.com/asari2349/HoppiiApp)にお願いします。<br>
                                改善案とかも募集しています。
                            </div>
                        </div>
                    </div>

                 
                    
                </div>


            </div>
        </div>
    </body>
</html>