<!DOCTYPE html>
<html lang="en">
<head>
<?php require_once(__DIR__ . '/../components/head.html') ?>
    <title>Paroly | restpassword</title>
</head>
<body>
    
</body>
</html>
<body class="antialiased bg-slate-200">
    <div class="max-w-lg mx-auto my-10 bg-white p-8 rounded-xl shadow shadow-slate-300">
        <h1 class="text-4xl font-medium">New password</h1>
        

        <form method="POST" action="" class="my-10">
            <div class="flex flex-col space-y-5">
                <label for="newPassword">
                    <p class="font-medium text-slate-700 pb-2">New password</p>
                    <input id="newPassword" name="newPassword" type="password" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow" placeholder="New Password">
                    <span class="text-red-500"><?= $data['password_error'] ?></span>
                </label>
                <label for="newConfirmPassword">
                    <p class="font-medium text-slate-700 pb-2">Confirm password</p>
                    <input id="newConfirmPassword" name="newConfirmPassword" type="password" class="w-full py-3 border border-slate-200 rounded-lg px-3 focus:outline-none focus:border-slate-500 hover:shadow" placeholder="New Confirm Password">
                    <span class="text-red-500"><?= $data['confirm_password_error'] ?></span>
                </label>
                <button name="changepassword" class=" w-full py-3 font-medium text-white bg-purple-600 hover:bg-purple-500 rounded-lg border-purple-500 hover:shadow inline-flex space-x-2 items-center justify-center">
                    
                      <!-- Reset password -->
                      <span>Save</span>
                </button>
                <p class="text-center">Not registered yet? <a href="/paroly/public/home/signup" class="text-purple-600 font-medium inline-flex space-x-1 items-center"><span>Register now </span><span><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                  </svg></span></a></p>
            </div>
        </form>
    </div>
    
</body>