<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="src/styles/input.css">
  <title>NF - page-one</title>
</head>
<body>

  <!-- Wrapper -->
  <div class="flex min-h-screen">

    <!-- Wrapper left -->
    <div class="hidden md:flex bg-[#333333] w-[560px] flex flex-col items-center justify-center gap-4">
      <img src="src/img/Data Page XML.png" alt="">
      <img class="w-[560px]" src="src/img/storyset.svg" alt="">
    </div>

    <!-- Wrapper right -->
    <div class="bg-[#5a5a5a] flex flex-col justify-center w-full">
      <div class="bg-[#333333] mx-4 md:mx-0 rounded-md self-center">
        <div class="bg-[#367362] py-6 rounded-tr-md rounded-tl-md">
          <h1 class="text-center text-white text-2xl">Login</h1>
        </div>
        <form class="flex lg:min-w-[400px] p-10 flex-col gap-4" method="post">
          <div>
            <label class="block text-[#efefef] mb-1" for="">Email</label>
            <input class="px-4 py-1 min-h-[40px] w-full rounded-md" type="email" required placeholder="email@email.com">
          </div>
          <div>
            <label class="block text-[#efefef] mb-1" for="">Senha</label>
            <input class="px-4 py-1 min-h-[40px] w-full rounded-md" required placeholder="**************">
          </div>
          <button class="bg-[#367362] text-white px-4 py-3 rounded-md hover:scale-105 transition-all ease-in-out focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-zinc-900 focus:ring-[#367362] transition-all disabled:opacity-50 disabled:hover:bg-[#367362]">Fazer Login</button>
          <h1 class="bg-[#c98c9d] text-center py-3 text-white rounded-md">Falha ao fazer login! (Mensagem)</h1>
        </form>
      </div>
    </div>
  </div>
  
</body>
</html>