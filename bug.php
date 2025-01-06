```php
function processData(array $data): array {
  foreach ($data as $key => $value) {
    if (is_array($value)) {
      $data[$key] = processData($value); // Recursive call
    } elseif (is_string($value) && strpos($value, 'error') !== false) {
      // Handle error strings, but don't explicitly throw an exception here.
      $data[$key] = str_replace('error', 'warning', $value); 
    }
  }
  return $data;
}

$inputData = [
  'field1' => 'some data',
  'field2' => ['subfield1' => 'another data', 'subfield2' => 'error occurred'],
  'field3' => 'more data with error',
];

$processedData = processData($inputData);
print_r($processedData);
```