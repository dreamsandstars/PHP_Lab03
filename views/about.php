<?php
$title = $title ?? 'About Us';
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
        <div class="dashboard-card" style="max-width: 900px; margin: 0 auto;">
            <div style="text-align: center; margin-bottom: 28px;">
                <h1 style="font-family: 'Plus Jakarta Sans', sans-serif; font-size: 2.2rem; font-weight: 800; color: #0f172a; margin: 0 0 8px 0; letter-spacing: -0.03em;">
                    About Our Application
                </h1>
                <p style="color: #64748b; font-size: 1.05rem; margin: 0; font-weight: 500;">
                    A lightweight, high-performance MVC routing demonstration built for PHP Lab 03.
                </p>
            </div>

            <div style="background: #f8fafc; border: 1px solid #f1f5f9; border-radius: 16px; padding: 24px; margin-bottom: 28px;">
                <h3 style="margin-top: 0; color: #0f172a; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1.15rem; font-weight: 700; margin-bottom: 8px;">
                    Architecture & Technology Stack
                </h3>
                <p style="color: #475569; font-size: 0.92rem; line-height: 1.6; margin: 0;">
                    This application utilizes a strict, custom **Front Controller** pattern where all requests are funneled through a single entry point (<code>public/index.php</code>). A specialized **Router** maps the HTTP request method and path variables directly to dedicated **Controllers**, producing standard responses (HTML, JSON, and Redirects).
                </p>
            </div>

            <h3 style="color: #0f172a; font-family: 'Plus Jakarta Sans', sans-serif; font-size: 1.1rem; font-weight: 700; margin: 0 0 16px 0; text-align: center;">
                General Processing Workflow (Luồng Hoạt Động)
            </h3>

            <!-- Premium Visual Flow Diagram -->
            <div class="flow-diagram">
                <div class="flow-step">
                    <div class="flow-icon bg-browser">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="3" width="20" height="18" rx="2" ry="2"/>
                            <line x1="2" y1="8" x2="22" y2="8"/>
                            <line x1="6" y1="5" x2="6.01" y2="5"/>
                            <line x1="10" y1="5" x2="10.01" y2="5"/>
                            <line x1="14" y1="5" x2="14.01" y2="5"/>
                        </svg>
                    </div>
                    <strong>Browser</strong>
                    <span>Sends Request</span>
                </div>

                <div class="flow-arrow">➔</div>

                <div class="flow-step">
                    <div class="flow-icon bg-server">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="8" rx="2" ry="2"/>
                            <rect x="2" y="14" width="20" height="8" rx="2" ry="2"/>
                            <line x1="6" y1="6" x2="6.01" y2="6"/>
                            <line x1="6" y1="18" x2="6.01" y2="18"/>
                        </svg>
                    </div>
                    <strong>Web Server</strong>
                    <span>PHP Built-in</span>
                </div>

                <div class="flow-arrow">➔</div>

                <div class="flow-step">
                    <div class="flow-icon bg-router">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="5" r="3"/>
                            <circle cx="5" cy="19" r="3"/>
                            <circle cx="19" cy="19" r="3"/>
                            <path d="M5 16V9a4 4 0 0 1 4-4h6a4 4 0 0 1 4 4v7"/>
                        </svg>
                    </div>
                    <strong>Router</strong>
                    <span>Front Controller</span>
                </div>

                <div class="flow-arrow">➔</div>

                <div class="flow-step">
                    <div class="flow-icon bg-controller">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="16 18 22 12 16 6"/>
                            <polyline points="8 6 2 12 8 18"/>
                        </svg>
                    </div>
                    <strong>Controller</strong>
                    <span>Business Logic</span>
                </div>

                <div class="flow-arrow">➔</div>

                <div class="flow-step">
                    <div class="flow-icon bg-response">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                            <polyline points="14 2 14 8 20 8"/>
                            <line x1="16" y1="13" x2="8" y2="13"/>
                            <line x1="16" y1="17" x2="8" y2="17"/>
                        </svg>
                    </div>
                    <strong>Response</strong>
                    <span>HTML / JSON</span>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
