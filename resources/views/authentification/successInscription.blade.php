<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <title>S'authentifier - UrgenceSAMU</title>
</head>

<body>
    <main>
        <div class="grid min-h-screen md:grid-cols-2 bg-violet-50" style="background-color: #1b1b1b;">
            <div class="flex flex-col items-center justify-center " style="background-color: #3232a7;">
                <div class="relative z-10">
                    <h1 class="my-4 font-bold text-white text-7xl">UrgenceSAMU</h1>
                    <p class="text-white">Entrez dans la monde des équipes du SAMU</p>
                    <div class="w-fit bg-white px-3 shadow-lg shadow-black/30 py-2 mt-4 rounded-md">
                        <a href="{{ url('/') }}"
                            class=" text-sm font-semibold rounded-md text-purple-600 hover:text-violet-700">Retour à
                            l'accueil</a>
                    </div>
                </div>
                <img src="../assets/images/3d-business-black-doctor-standing-with-clipboard-and-writing.png"
                    alt="" class="absolute z-0 opacity-20" srcset="">
            </div>
            <div class="fixed top-0 flex items-center justify-center w-full h-full p-3 md:p-0 md:relative">
                <div class="bg-white p-8 ">
                    Inscription Réussie, connectez vous en cliquant  <br> <a href="{{ url('/connexion') }}"  class=" text-sm rounded-md text-stone-600 hover:text-violet-700">Ici</a>.
                </div> 
            </div>
        </div>
    </main>
</body>
<script>
    const phoneSignin = document.getElementById("phoneSignin");
    const emailSignin = document.getElementById("emailSignin");
    const emailToPhone = document.getElementById("email-to-phone");
    const phoneToEmail = document.getElementById("phone-to-email");
    const passwordButton = document.getElementById("passwordButton");
    const hiddenPassword = document.getElementById("hiddenPassword");
    const showPassword = document.getElementById("showPassword");
    const password = document.getElementById("password");
    let signInMethod = false;
    window.addEventListener('load', () => {
        let show = false;
        passwordButton.addEventListener('click', () => {
            if (!show) {
                hiddenPassword.classList.remove('hidden');
                showPassword.classList.add('hidden');
                password.type = 'text';
                show = true;
            } else {
                hiddenPassword.classList.add('hidden');
                showPassword.classList.remove('hidden');
                password.type = 'password';
                show = false;
            }
        })
        phoneSignin.addEventListener('click', () => {
            phoneToEmail.classList.remove("hidden");
            phoneToEmail.classList.add("block");
            emailToPhone.classList.add('hidden');
            emailToPhone.classList.remove('block');
            phoneSignin.classList.add('hidden');
            emailSignin.classList.remove('hidden');
            signInMethod = true;
        });
        emailSignin.addEventListener('click', () => {
            phoneToEmail.classList.add("hidden");
            phoneToEmail.classList.remove("block");
            emailToPhone.classList.remove('hidden');
            emailToPhone.classList.add('block');
            phoneSignin.classList.remove('hidden');
            emailSignin.classList.add('hidden');
            signInMethod = false;
        });
        signinButton.addEventListener('click', () => {
            window.location.href = "../dashboard/index.html";

        });
    })
</script>

</html>