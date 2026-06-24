<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

echo '<html><head><title>Deployment Diagnostics</title>';
echo '<style>body { font-family: sans-serif; line-height: 1.6; padding: 20px; background: #f8fafc; color: #334155; } h1 { color: #1e293b; } ul { background: white; padding: 20px 40px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); list-style-type: none; } li { padding: 8px 0; border-bottom: 1px solid #f1f5f9; } li:last-child { border-bottom: none; }</style>';
echo '</head><body>';
echo '<h1>Laravel Deployment Diagnostics</h1>';
echo '<p><strong>PHP Version:</strong> '.PHP_VERSION.'</p>';
echo '<p><strong>Document Root:</strong> '.$_SERVER['DOCUMENT_ROOT'].'</p>';

echo '<h2>PHP Configuration Files:</h2><ul>';
echo '<li><strong>Loaded php.ini:</strong> '.php_ini_loaded_file().'</li>';
echo '<li><strong>Scanned ini files:</strong> '.php_ini_scanned_files().'</li>';
echo '<li><strong>Extension Directory (extension_dir):</strong> '.ini_get('extension_dir').'</li>';
echo '</ul>';

echo '<h2>All Loaded Extensions:</h2><p>'.implode(', ', get_loaded_extensions()).'</p>';

$extensions = ['pdo', 'pdo_mysql', 'mbstring', 'openssl', 'xml', 'dom', 'curl', 'fileinfo', 'gd', 'zip'];
echo '<h2>Required Extensions Check:</h2><ul>';
foreach ($extensions as $ext) {
    $loaded = extension_loaded($ext) ? "<span style='color:green; font-weight:bold;'>LOADED</span>" : "<span style='color:red; font-weight:bold;'>NOT LOADED</span>";
    echo "<li><strong>$ext</strong>: $loaded</li>";
}
echo '</ul>';

echo '<h2>Directory Writable Check:</h2><ul>';
$dirs = [
    'storage',
    'storage/logs',
    'bootstrap/cache',
];
foreach ($dirs as $dir) {
    $abs = realpath(__DIR__.'/'.$dir);
    if (! $abs) {
        $abs = realpath(__DIR__.'/../'.$dir);
    }
    if ($abs) {
        $writable = is_writable($abs) ? "<span style='color:green; font-weight:bold;'>WRITABLE</span>" : "<span style='color:red; font-weight:bold;'>NOT WRITABLE</span>";
        echo "<li><strong>$dir</strong> ($abs): $writable (Permissions: ".substr(sprintf('%o', fileperms($abs)), -4).')</li>';
    } else {
        echo "<li><strong>$dir</strong> ($dir): <span style='color:red; font-weight:bold;'>DOES NOT EXIST</span></li>";
    }
}
echo '</ul>';

echo '<h2>Database Connection Check:</h2>';
$env_path = realpath(__DIR__.'/../.env');
if ($env_path && file_exists($env_path)) {
    $env_content = file_get_contents($env_path);
    $db_config = [];
    foreach (explode("\n", $env_content) as $line) {
        $line = trim($line);
        if (empty($line) || strpos($line, '#') === 0) {
            continue;
        }
        if (strpos($line, '=') !== false) {
            [$key, $val] = explode('=', $line, 2);
            $key = trim($key);
            $val = trim($val);
            if (preg_match('/^"([^"]*)"$/', $val, $matches)) {
                $val = $matches[1];
            } elseif (preg_match('/^\'([^\']*)\'$/', $val, $matches)) {
                $val = $matches[1];
            }
            $db_config[$key] = $val;
        }
    }

    $connection = isset($db_config['DB_CONNECTION']) ? $db_config['DB_CONNECTION'] : 'mysql';
    $host = isset($db_config['DB_HOST']) ? $db_config['DB_HOST'] : '127.0.0.1';
    $port = isset($db_config['DB_PORT']) ? $db_config['DB_PORT'] : '3306';
    $db_name = isset($db_config['DB_DATABASE']) ? $db_config['DB_DATABASE'] : '';
    $username = isset($db_config['DB_USERNAME']) ? $db_config['DB_USERNAME'] : '';
    $password = isset($db_config['DB_PASSWORD']) ? $db_config['DB_PASSWORD'] : '';

    echo '<ul>';
    echo "<li><strong>Connection Type:</strong> $connection</li>";
    echo "<li><strong>Host:</strong> $host:$port</li>";
    echo "<li><strong>Database Name:</strong> $db_name</li>";
    echo "<li><strong>Username:</strong> $username</li>";
    echo '</ul>';

    if (extension_loaded('pdo') && extension_loaded('pdo_mysql')) {
        try {
            $dsn = "mysql:host=$host;port=$port;dbname=$db_name;charset=utf8mb4";
            $pdo = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_TIMEOUT => 5,
            ]);
            echo "<p style='color:green; font-weight:bold;'>SUCCESS: Database connection established successfully!</p>";
        } catch (PDOException $e) {
            echo "<p style='color:red; font-weight:bold;'>FAILURE: Could not connect to the database. Error: ".$e->getMessage().'</p>';
        }
    } else {
        echo "<p style='color:orange; font-weight:bold;'>WARNING: Cannot test connection because pdo or pdo_mysql extensions are not loaded.</p>";
    }
} else {
    echo "<p style='color:red; font-weight:bold;'>FAILURE: .env file not found at ".($env_path ? $env_path : 'relative path ../.env').'</p>';
}

echo '</body></html>';
