<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Validation</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div
        class="relative flex min-h-screen flex-col items-center justify-center overflow-hidden py-6 sm:py-12 bg-slate-200">
        <div class="container w-1/2 flex flex-col justify-center py-5 px-0 text-center border bg-[#0d1829]">
            <div class="flex items-center justify-center">
                <img src="image/LC.png" alt="Logo" class="h-[200px] w-[200px]">
            </div>
            <div class="bg-white text-[#0d1829] flex flex-col items-center justify-center px-5 py-10 my-5">
                <div class="h-16 w-16">
                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 117.72 117.72"
                        style="enable-background:new 0 0 117.72 117.72" xml:space="preserve">
                        <style type="text/css">
                            <![CDATA[
                            .st0 {
                                fill: #01A601;
                            }
                            ]]>
                        </style>
                        <g>
                            <path class="st0"
                                d="M58.86,0c9.13,0,17.77,2.08,25.49,5.79c-3.16,2.5-6.09,4.9-8.82,7.21c-5.2-1.89-10.81-2.92-16.66-2.92 c-13.47,0-25.67,5.46-34.49,14.29c-8.83,8.83-14.29,21.02-14.29,34.49c0,13.47,5.46,25.66,14.29,34.49 c8.83,8.83,21.02,14.29,34.49,14.29s25.67-5.46,34.49-14.29c8.83-8.83,14.29-21.02,14.29-34.49c0-3.2-0.31-6.34-0.9-9.37 c2.53-3.3,5.12-6.59,7.77-9.85c2.08,6.02,3.21,12.49,3.21,19.22c0,16.25-6.59,30.97-17.24,41.62 c-10.65,10.65-25.37,17.24-41.62,17.24c-16.25,0-30.97-6.59-41.62-17.24C6.59,89.83,0,75.11,0,58.86 c0-16.25,6.59-30.97,17.24-41.62S42.61,0,58.86,0L58.86,0z M31.44,49.19L45.8,49l1.07,0.28c2.9,1.67,5.63,3.58,8.18,5.74 c1.84,1.56,3.6,3.26,5.27,5.1c5.15-8.29,10.64-15.9,16.44-22.9c6.35-7.67,13.09-14.63,20.17-20.98l1.4-0.54H114l-3.16,3.51 C101.13,30,92.32,41.15,84.36,52.65C76.4,64.16,69.28,76.04,62.95,88.27l-1.97,3.8l-1.81-3.87c-3.34-7.17-7.34-13.75-12.11-19.63 c-4.77-5.88-10.32-11.1-16.79-15.54L31.44,49.19L31.44,49.19z" />
                        </g>
                    </svg>
                </div>
                <h2 class="my-2 text-[22px] font-mono ">Bonjour {{ $mailData['nom'] }},<br>
                    Votre demande à été acceptée par l'Directeur</h2>
                <p class="text-slate-700 text-[18px] my-4"> Êtes-vous prêt à accéder à toutes les ressources que nous
                    avons  élaborées pour les etudiants de lodge cité univesitaire ?
                </p>
                <p class=" mb-2">votre adresse email : <span
                        class="font-medium text-indigo-500"> {{ $mailData['email'] }}</span></p>
                <p class=" text-[18px]  my-4">
                    Tout d’abord, vous devez compléter votre inscription et vos compte en cliquant sur le bouton
                    ci-dessous :
                </p>
                <a href="{{ $mailData['link'] }}"
                    class="mt-3 inline-block w-96 rounded bg-blue-600 px-5 py-3 font-medium text-white shadow-md shadow-indigo-500/20 hover:bg-blue-700">S'incrire
                    →</a>
                    <p class="text-[16px] block my-5">
                        Ce lien permettra de creer vos compte et vérifier votre adresse e-mail, et vous serez alors officiellement membre de
                        la communauté des AELU
                        <span class="text-xs">(Association des Etudiants de lodge cité Universitaire).</span>
                    </p>
            </div>
            <div class="my-5 text-slate-50"> 
                <div class="p-5">
                    <span class="">
                        A bientôt !
                    </span>
                </div>
                <div>
                    <span>
                        Cordialement,<br />
                         l’équipe de Lodge Cité 
                    </span>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
