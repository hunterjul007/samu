<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./../../assets/output.css" rel="stylesheet">
    <link href="./../../assets/global.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <title>Verify Email - Japcare</title>
</head>

<body>
    <main>
        <div class="grid min-h-screen md:grid-cols-2 bg-orange-50" style="background-color: #FFEDE6;">
            <div class="flex items-center justify-center " style="background-color: #FB7C37;">
                <img src="./../../assets/images/authentification.svg" alt="" srcset="">
            </div>
            <!-- <div class="fixed top-0 left-0 w-full h-full bg-black/40"></div> -->
            <div class="fixed top-0 flex items-center justify-center w-full h-full p-3 md:p-0 md:relative">
                <form id="form" class="w-full p-10 m-auto bg-white rounded-md shadow-xl md:shadow-none "
                    style="max-width: 456px;  ">
                    <div class="space-y-12">
                        <div class="pb-12 ">
                            <h2 class="text-2xl leading-7 text-gray-900">Verify Email</h2>
                            <div class="grid grid-cols-1 gap-4 py-4 mt-4">
                                <p class="font-bold">We’ve sent a verification email to <a target="_blank"
                                        href="https://mail.google.com/" rel=""
                                        class="text-orange-500">email@email.com</a>
                                </p>
                                <div class="grid grid-cols-6 gap-2">
                                    <div>
                                        <input type="text" maxlength="1" id="number1"
                                            class="w-full p-3 text-sm focus-visible:bg-orange-100/40 focus-visible:outline-orange-500 focus-visible:outline-1 focus-visible:placeholder:text-orange-500 rounded-xl bg-stone-100"
                                            placeholder="_" name="phone">
                                    </div>
                                    <div> <input type="text" maxlength="1" id="number2"
                                            class="w-full p-3 text-sm focus-visible:bg-orange-100/40 focus-visible:outline-orange-500 focus-visible:outline-1 focus-visible:placeholder:text-orange-500 rounded-xl bg-stone-100"
                                            placeholder="_" name="phone"></div>
                                    <div> <input type="text" maxlength="1" id="number3"
                                            class="w-full p-3 text-sm focus-visible:bg-orange-100/40 focus-visible:outline-orange-500 focus-visible:outline-1 focus-visible:placeholder:text-orange-500 rounded-xl bg-stone-100"
                                            placeholder="_" name="phone"></div>
                                    <div> <input type="text" maxlength="1" id="number4"
                                            class="w-full p-3 text-sm focus-visible:bg-orange-100/40 focus-visible:outline-orange-500 focus-visible:outline-1 focus-visible:placeholder:text-orange-500 rounded-xl bg-stone-100"
                                            placeholder="_" name="phone"></div>
                                    <div> <input type="text" maxlength="1" id="number5"
                                            class="w-full p-3 text-sm focus-visible:bg-orange-100/40 focus-visible:outline-orange-500 focus-visible:outline-1 focus-visible:placeholder:text-orange-500 rounded-xl bg-stone-100"
                                            placeholder="_" name="phone"></div>
                                    <div> <input type="text" maxlength="1" id="number6"
                                            class="w-full p-3 text-sm focus-visible:bg-orange-100/40 focus-visible:outline-orange-500 focus-visible:outline-1 focus-visible:placeholder:text-orange-500 rounded-xl bg-stone-100"
                                            placeholder="_" name="phone"></div>
                                </div>
                                <p class="text-sm text-stone-600">Didn’t get the code? <button type="button"
                                        class="text-orange-500" id="resend">Resend it</button></p>
                                <div id="loader" class="opacity-0">
                                    <img src="./../../assets/images/loader.svg" class=" animate-spin" alt="" srcset="">
                                </div>
                                <div id="resendMessage" class="hidden">
                                    The code will be sent in <span id="compteur"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" id="submitButton"
                            class="w-full p-3 my-2 text-sm text-white rounded-md focus-within:outline-4 focus-visible:outline-orange-400/70 disabled:bg-stone-700 bg-stone-950 hover:bg-stone-900">Submit</button>
                        <button type="button" class="text-sm text-orange-500" id="backButton">Back</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
<script>
    const resend = document.getElementById("resend");
    const loader = document.getElementById("loader");
    const compteur = document.getElementById("compteur");
    const resendMessage = document.getElementById("resendMessage");
    const submitButton = document.getElementById("submitButton");
    const number1 = document.getElementById("number1");
    const number2 = document.getElementById("number2");
    const number3 = document.getElementById("number3");
    const number4 = document.getElementById("number4");
    const number5 = document.getElementById("number5");
    const number6 = document.getElementById("number6");
    const backButton = document.getElementById("backButton");
    backButton.addEventListener('click', () => {
        history.back();
    })
    let completed = false;
    number1.focus();
    let i = 30;
    number1.addEventListener('input', () => {
        if (!completed)
            number2.focus();
    })
    number2.addEventListener('input', () => {
        if (!completed)
            number3.focus();
    })
    number3.addEventListener('input', () => {
        if (!completed)
            number4.focus();
    })
    number4.addEventListener('input', () => {
        if (!completed)
            number5.focus();
    })
    number5.addEventListener('input', () => {
        if (!completed)
            number6.focus();
    })
    number6.addEventListener('input', () => {
        if (!completed) {
            submitButton.focus();
            completed = true;
        }
    })

    form.addEventListener('submit', (e) => {
        e.preventDefault();
        if (number1.value != "" &&
            number2.value != "" && 
            number3.value != "" && 
            number4.value != "" && 
            number6.value != "" && 
            number5.value != "") {
            window.location.href = "../dashboard/index.html";
        }else{
            alert("Error")
        }
    })

    resend.addEventListener('click', () => {
        loader.classList.remove('animate-rotate-out');
        loader.classList.add('animate-rotate-in');
        loader.classList.remove('opacity-0');
        loader.classList.add('opacity-100');
        submitButton.disabled = true;
        setTimeout(() => {
            loader.classList.remove('animate-rotate-in');
            loader.classList.add('animate-rotate-out');
            loader.classList.remove('opacity-100');
            loader.classList.add('opacity-0');
            loader.classList.add('hidden');
            resendMessage.classList.remove('hidden');
            let intervalResend = setInterval(() => {
                switch (i) {
                    case 1:
                        compteur.innerText = i + " second";
                        break;
                    case 0:
                        compteur.innerText = i + " second";
                        clearInterval(intervalResend);
                        submitButton.disabled = false;
                        number1.value = "";
                        number2.value = "";
                        number3.value = "";
                        number4.value = "";
                        number5.value = "";
                        number6.value = "";
                        completed = false;
                        number1.focus();
                        break;
                    default:
                        compteur.innerText = i + " seconds";
                        break;
                }
                i--;
            }, 1000);
        }, 3000);
    })


</script>

</html>