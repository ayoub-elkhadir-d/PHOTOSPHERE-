try {
$dbh = new PDO('mysql:host=localhost;dbname=test', $user, $pass);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Begin a transaction
$dbh->beginTransaction();

// Execute multiple queries
$dbh->exec("INSERT INTO users (name) VALUES ('John')");
$dbh->exec("INSERT INTO users (name) VALUES ('Doe')");

// Commit the transaction
$dbh->commit();
} catch (Exception $e) {
// Rollback the transaction if something failed
$dbh->rollBack();
echo "Failed: " . $e->getMessage();
}