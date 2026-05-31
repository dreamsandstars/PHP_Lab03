<?php
$title = $title ?? 'Add Book';
$error = $error ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title) ?></title>
    <link rel="stylesheet" href="/assets/style.css">
</head>
<body>
    <header class="topbar">
        <strong>PHP Mini Bookstore Router</strong>
        <nav>
            <a href="/">Home</a>
            <a href="/books">Books</a>
            <a href="/books/create">Add Book</a>
            <a href="/health">Health</a>
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
            <a href="/login">Login</a>
            <a href="/logout">Logout</a>
        </nav>
    </header>

    <main class="container viewport-height">
        <div class="dashboard-card" style="max-width: 720px; margin: 0 auto; padding: 28px 32px;">
            <h1 style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1.8rem; font-weight: 800; color: #0f172a; margin: 0 0 4px 0; text-align: center; letter-spacing: -0.02em;">
                Add New Book
            </h1>
            <p style="color: #64748b; font-size: 0.9rem; margin: 0 0 20px 0; text-align: center;">
                This form submits to <code>POST /books</code>.
            </p>

            <?php if ($error): ?>
                <div class="alert danger" style="padding: 10px 16px; margin-bottom: 16px; font-size: 0.88rem;">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <form method="POST" action="/books" style="margin: 0;">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px 20px; margin-bottom: 24px;">
                    <div class="form-group" style="margin-bottom: 0;">
                        <label style="font-size: 0.8rem; margin-bottom: 6px; font-weight: 600;">Book ISBN</label>
                        <input type="text" name="isbn" placeholder="978-0132350884" style="padding: 8px 12px; font-size: 0.9rem;">
                    </div>

                    <div class="form-group" style="margin-bottom: 0;">
                        <label style="font-size: 0.8rem; margin-bottom: 6px; font-weight: 600;">Book Title</label>
                        <input type="text" name="title" placeholder="Clean Code" style="padding: 8px 12px; font-size: 0.9rem;">
                    </div>

                    <div class="form-group" style="margin-bottom: 0;">
                        <label style="font-size: 0.8rem; margin-bottom: 6px; font-weight: 600;">Category / Genre</label>
                        <input type="text" name="category" placeholder="Technology" style="padding: 8px 12px; font-size: 0.9rem;">
                    </div>

                    <div class="form-group" style="margin-bottom: 0;">
                        <label style="font-size: 0.8rem; margin-bottom: 6px; font-weight: 600;">Author</label>
                        <input type="text" name="author" placeholder="Robert C. Martin" style="padding: 8px 12px; font-size: 0.9rem;">
                    </div>

                    <div class="form-group" style="margin-bottom: 0;">
                        <label style="font-size: 0.8rem; margin-bottom: 6px; font-weight: 600;">Price (VND)</label>
                        <input type="number" name="price" placeholder="450000" style="padding: 8px 12px; font-size: 0.9rem;">
                    </div>

                    <div class="form-group" style="margin-bottom: 0;">
                        <label style="font-size: 0.8rem; margin-bottom: 6px; font-weight: 600;">Quantity</label>
                        <input type="number" name="quantity" placeholder="12" style="padding: 8px 12px; font-size: 0.9rem;">
                    </div>
                </div>

                <div style="display: flex; gap: 12px; justify-content: center;">
                    <button class="button" type="submit" style="margin: 0; padding: 10px 24px; font-size: 0.9rem;">Save Book</button>
                    <a class="button secondary" href="/books" style="margin: 0; padding: 10px 24px; font-size: 0.9rem;">Back to Books</a>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
