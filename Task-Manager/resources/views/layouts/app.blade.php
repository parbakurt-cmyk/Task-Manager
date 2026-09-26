<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Personal Task Manager')</title>
    <style>
        :root {
            --bg: #f4f6f9;
            --card: #ffffff;
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --danger: #dc2626;
            --danger-dark: #b91c1c;
            --success: #16a34a;
            --pending: #f59e0b;
            --text: #1f2937;
            --muted: #6b7280;
            --border: #e5e7eb;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Segoe UI', Roboto, Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
        }
        header {
            background: linear-gradient(90deg, var(--primary), #7c3aed);
            color: #fff;
            padding: 1.25rem 2rem;
        }
        header h1 {
            margin: 0;
            font-size: 1.5rem;
        }
        header p {
            margin: .25rem 0 0;
            opacity: .85;
            font-size: .9rem;
        }
        .container {
            max-width: 960px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }
        .card {
            background: var(--card);
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,.08);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }
        .btn {
            display: inline-block;
            border: none;
            border-radius: 8px;
            padding: .55rem 1.1rem;
            font-size: .9rem;
            cursor: pointer;
            text-decoration: none;
            font-weight: 600;
            transition: background .15s ease;
        }
        .btn-primary { background: var(--primary); color: #fff; }
        .btn-primary:hover { background: var(--primary-dark); }
        .btn-danger { background: var(--danger); color: #fff; }
        .btn-danger:hover { background: var(--danger-dark); }
        .btn-outline { background: transparent; border: 1px solid var(--border); color: var(--text); }
        .btn-outline:hover { background: #f3f4f6; }
        .btn-sm { padding: .35rem .7rem; font-size: .8rem; }

        table { width: 100%; border-collapse: collapse; }
        th, td { text-align: left; padding: .75rem .6rem; border-bottom: 1px solid var(--border); vertical-align: top; }
        th { color: var(--muted); font-size: .78rem; text-transform: uppercase; letter-spacing: .03em; }
        tr:hover { background: #fafafa; }

        .badge {
            display: inline-block;
            padding: .25rem .65rem;
            border-radius: 999px;
            font-size: .75rem;
            font-weight: 700;
        }
        .badge-pending { background: #fef3c7; color: #92400e; }
        .badge-completed { background: #dcfce7; color: #166534; }

        .actions { display: flex; gap: .4rem; flex-wrap: wrap; }

        form.inline { display: inline; }

        .form-group { margin-bottom: 1.1rem; }
        label { display: block; font-weight: 600; margin-bottom: .35rem; font-size: .88rem; }
        input[type=text], input[type=date], textarea, select {
            width: 100%;
            padding: .6rem .7rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: .95rem;
            font-family: inherit;
        }
        textarea { min-height: 100px; resize: vertical; }

        .alert {
            padding: .8rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.25rem;
            font-size: .9rem;
        }
        .alert-success { background: #dcfce7; color: #166534; }
        .alert-error { background: #fee2e2; color: #991b1b; }

        .empty-state { text-align: center; padding: 2.5rem 1rem; color: var(--muted); }

        .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; }
        .top-bar h2 { margin: 0; }

        .error-list { color: var(--danger); font-size: .85rem; margin: .3rem 0 0; padding-left: 1.1rem; }
    </style>
</head>
<body>
    <header>
        <h1>📝 Personal Task Manager</h1>
        <p>Laravel Mini Project — WST21-PM-2026-SF</p>
    </header>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>
