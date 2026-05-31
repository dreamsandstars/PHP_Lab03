<?php
$title = $title ?? 'Book Details';
$book = $book ?? null;

function stockStatus(int $quantity): string
{
    if ($quantity <= 0) {
        return 'Out of stock';
    }

    if ($quantity <= 5) {
        return 'Low stock';
    }

    return 'Available';
}

function stockClass(int $quantity): string
{
    if ($quantity <= 0) {
        return 'danger';
    }

    if ($quantity <= 5) {
        return 'warning';
    }

    return 'success';
}
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
        <?php if ($book): ?>
            <div class="dashboard-card" style="max-width: 580px; margin: 0 auto; padding: 40px 36px;">
                <div style="width: 56px; height: 56px; background-color: #f0fdf4; color: #16a34a; border-radius: 14px; display: flex; align-items: center; justify-content: center; margin-bottom: 24px;">
                    <!-- Book Open SVG Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/>
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>
                    </svg>
                </div>

                <div style="margin-bottom: 28px;">
                    <span class="badge success" style="font-size: 0.75rem; padding: 4px 10px; margin-bottom: 8px; display: inline-block;">
                        <?= htmlspecialchars($book['category']) ?>
                    </span>
                    <h1 style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1.8rem; font-weight: 800; color: #0f172a; margin: 0 0 6px 0; letter-spacing: -0.02em;">
                        <?= htmlspecialchars($book['title']) ?>
                    </h1>
                    <p style="color: #64748b; font-size: 1rem; margin: 0; font-weight: 500;">
                        by <strong style="color: #334155;"><?= htmlspecialchars($book['author']) ?></strong>
                    </p>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; border-top: 1px solid #f1f5f9; border-bottom: 1px solid #f1f5f9; padding: 24px 0; margin-bottom: 32px;">
                    <div>
                        <div style="font-size: 0.75rem; color: #94a3b8; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px;">ISBN Number</div>
                        <div style="font-size: 0.95rem; color: #334155; font-weight: 600; font-family: monospace;"><?= htmlspecialchars($book['isbn']) ?></div>
                    </div>

                    <div>
                        <div style="font-size: 0.75rem; color: #94a3b8; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px;">Book Price</div>
                        <div style="font-size: 0.95rem; color: #334155; font-weight: 600;"><?= number_format($book['price']) ?> VND</div>
                    </div>

                    <div>
                        <div style="font-size: 0.75rem; color: #94a3b8; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px;">Stock Count</div>
                        <div style="font-size: 0.95rem; color: #334155; font-weight: 600;"><?= htmlspecialchars((string) $book['quantity']) ?> copies</div>
                    </div>

                    <div>
                        <div style="font-size: 0.75rem; color: #94a3b8; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 4px;">Status</div>
                        <div style="display: inline-block;">
                            <span class="badge <?= stockClass((int) $book['quantity']) ?>" style="font-size: 0.8rem; padding: 3px 8px;">
                                <?= stockStatus((int) $book['quantity']) ?>
                            </span>
                        </div>
                    </div>
                </div>

                <div style="display: flex; gap: 12px;">
                    <a class="button" href="/books" style="margin: 0; padding: 10px 24px; font-size: 0.9rem;">
                        Back to Catalog
                    </a>
                </div>
            </div>
        <?php else: ?>
            <div class="alert danger">No book data available.</div>
        <?php endif; ?>
    </main>
</body>
</html>
