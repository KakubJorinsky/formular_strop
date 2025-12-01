<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STROP Registrace</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="script/script.js" defer></script>
</head>
<body>
    <header>

    </header>
    <main>
        <section class="form">
            <div class="form-header">
                <img src="/images/encystropedie_circle.png" alt="strop">
                <h2>Vytvořit účet</h2>
            </div>
            <form action="#">
                <div class="form-main">
                <div class="form-main-inputs">
                        <div class="form-main-inputs-label">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            <label for="name">E-mail</label>
                        </div>
                        <input type="text" placeholder="Enter your E-mail (e.g. zabrodsky@souepl.cz)">
                    </div>
                    <div class="form-main-inputs">
                        <div class="form-main-inputs-label">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            <label for="name">Username</label>
                        </div>
                        <input type="text" placeholder="Enter your Username (alphanumeric only)">
                    </div>
                    <div class="form-main-inputs">
                        <div class="form-main-inputs-label">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                            <label for="name">Password</label>
                        </div>
                        <input type="password" placeholder="Enter your password (min 6 characters)">
                    </div>
                    <div class="form-main-inputs">
                        <div class="form-main-inputs-label">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                            <label for="name">Confirm password</label>
                        </div>
                        <input type="password" placeholder="Confirm your password">
                    </div>
                </div>
                <div class="form-control">
                    <input type="checkbox" name="checkbock" id="terms">
                    <label for="checkbox">
                        I agree with
                        <a href="#">Terms and conditions</a>
                    </label>
                </div>
                <div class="form-buttons">
                    <button type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z" />
                    </svg>
                    Create account
                    </button>
                </div>
            </form>
            <div class="form-footer">
                <a href="login.php">
                    <span>Already have an account?</span>
                    Log in
                </a>
            </div>
        </section>
    </main>
    <footer>

    </footer>
</body>
</html>