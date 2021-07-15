<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>

    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8 container max-w-full mx-auto content-center mx-auto">
        <div class="mx-auto">
            <form method="POST" action="" class="items-center">
                @csrf
                <div class="">
                    <label class="ml-6 font-semibold">Enter your URL:</label>
                    <input type="text" name="target" id="target" value="{{ isset($url) ? $url->target : '' }}"
                        class="border">
                </div>


                <div class="flex">
                    <button type="submit"
                        class="bg-blue-500 rounded-xl p-3 border border-blue-500 text-white ml-8 mt-3">Shorten
                        it!</button>
                        <p class=" p-3 ml-8 mt-3 flex-inline font-semibold">
                            @if (isset($url))
                                <a href="{{ url('/' . $url->short ) }}">{{ isset($url) ?  \URL::current() . "/" . $url->short : '' }}</a>
                            @endif
                            
                        </p>
                </div>
            </form>
        </div>
    </section>
</body>

</html>
