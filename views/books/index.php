<?php
$title = $title ?? 'Bookstore';
$books = $books ?? [];
$categories = $categories ?? [];
$selectedCategory = $selectedCategory ?? '';
$searchQuery = $searchQuery ?? '';
$created = $created ?? false;

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

    <main class="container">
        <?php if ($created): ?>
            <div class="alert success">
                Book record submitted successfully. Redirect response worked.
            </div>
        <?php endif; ?>

        <div class="page-header" style="margin-bottom: 24px;">
            <div>
                <h1>Book Catalog</h1>
                <p>This page is handled by BookController@index.</p>
            </div>

            <a class="button" href="/books/create">Add Book</a>
        </div>

        <!-- Premium Search & Filter Bar -->
        <div style="background: white; border: 1px solid #e2e8f0; border-radius: 12px; padding: 16px; margin-bottom: 24px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.02);">
            <form method="GET" action="/books" style="display: flex; gap: 16px; align-items: center; flex-wrap: wrap;">
                <div style="flex: 2; min-width: 240px; display: flex; flex-direction: column; gap: 4px;">
                    <input type="text" name="search" value="<?= htmlspecialchars($searchQuery) ?>" placeholder="Search by title, ISBN or author..." style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.9rem;">
                </div>

                <div style="flex: 1; min-width: 160px; display: flex; flex-direction: column; gap: 4px;">
                    <select name="category" style="width: 100%; padding: 8px 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.9rem; background: white; color: #334155;">
                        <option value="">All Categories</option>
                        <?php foreach ($categories as $cat): ?>
                            <option value="<?= htmlspecialchars($cat) ?>" <?= strcasecmp($cat, $selectedCategory) === 0 ? 'selected' : '' ?>>
                                <?= htmlspecialchars($cat) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div style="display: flex; gap: 8px; align-items: center;">
                    <button class="button" type="submit" style="margin: 0; padding: 8px 16px; font-size: 0.9rem;">Filter</button>
                    <?php if ($searchQuery !== '' || $selectedCategory !== ''): ?>
                        <a class="button secondary" href="/books" style="margin: 0; padding: 8px 16px; font-size: 0.9rem; border: 1px solid #cbd5e1;">Reset</a>
                    <?php endif; ?>
                </div>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th style="text-align: center;">Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php if (empty($books)): ?>
                    <tr>
                        <td colspan="8" style="text-align: center; color: #64748b; padding: 24px;">No books found matching your filter criteria.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($books as $book): ?>
                        <tr>
                            <td style="font-family: monospace; font-weight: 600; color: #334155;"><?= htmlspecialchars($book['isbn']) ?></td>
                            <td><?= htmlspecialchars($book['title']) ?></td>
                            <td><?= htmlspecialchars($book['category']) ?></td>
                            <td><?= htmlspecialchars($book['author']) ?></td>
                            <td><?= number_format($book['price']) ?> VND</td>
                            <td><?= htmlspecialchars((string) $book['quantity']) ?></td>
                            <td>
                                <span class="badge <?= stockClass((int) $book['quantity']) ?>">
                                    <?= stockStatus((int) $book['quantity']) ?>
                                </span>
                            </td>
                            <td style="text-align: center;">
                                <a href="/books/<?= htmlspecialchars($book['isbn']) ?>" class="button secondary" style="margin: 0; padding: 4px 10px; font-size: 0.8rem; border-radius: 6px; display: inline-flex; align-items: center; gap: 4px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                    View
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
