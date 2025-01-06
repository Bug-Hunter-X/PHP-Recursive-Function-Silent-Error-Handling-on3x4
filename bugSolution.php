```php
function processData(array $data): array {
  foreach ($data as $key => $value) {
    if (is_array($value)) {
      $data[$key] = processData($value); // Recursive call
    } elseif (is_string($value) && strpos($value, 'error') !== false) {
      // Explicitly throw an exception for improved error handling
      throw new Exception("Error found in data: " . $value);
    }
  }
  return $data;
}

$inputData = [
  'field1' => 'some data',
  'field2' => ['subfield1' => 'another data', 'subfield2' => 'error occurred'],
  'field3' => 'more data with error',
];

try {
  $processedData = processData($inputData);
  print_r($processedData);
} catch (Exception $e) {
  // Handle exceptions appropriately
  echo "An error occurred: " . $e->getMessage();
}
```