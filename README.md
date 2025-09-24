# Validate SL Number

A PHP package to validate Sierra Leone phone numbers and return them in a fully qualified format with country code.

---

## 📦 Installation

Install via Composer:

```bash
composer require silotech/validate-sl-number
```

If your package is in development and you want to allow unstable versions, you can specify:

```bash
composer require silotech/validate-sl-number:dev-main
```

---

## ⚙️ Usage

### Include Composer’s autoload file and call the function:

```php
<?php
require __DIR__ . "/vendor/autoload.php";

$phone = "0023273111222";
$result = isPhoneNumberAValidSLNumber($phone);

if ($result !== false) {
    echo "Valid SL Number: " . $result;
} else {
    echo "Invalid SL Number";
}
```

---

## 📝 Function

```php
isPhoneNumberAValidSLNumber(string $phone_number): bool|string
```

Validates a Sierra Leone phone number and returns it in fully qualified format with `+232` if valid.

**Parameters**:  
- `$phone_number (string)` — The phone number to validate.  

**Acceptable formats**:  
- `+232xxxxxxxx`  
- `00232xxxxxxxx`  
- Local format: `0xxxxxxxx`  

**Returns**:  
- `string` — Fully qualified phone number if valid (e.g., `+23276111222`)  
- `false` if invalid  

---

## 🔍 Examples

```php
isPhoneNumberAValidSLNumber("+23273111222");   // "+23273111222"
isPhoneNumberAValidSLNumber("0023232111222"); // "+23232111222"
isPhoneNumberAValidSLNumber("033111222");     // "+23233111222"
isPhoneNumberAValidSLNumber("070111222");     // false
```

---

## 🛠 Requirements

- PHP >= 7.4  
- Composer  

---

## 📚 Development

If you are developing or updating this package:

```bash
git clone https://github.com/sepolly/validate-sl-number.git
cd validate-sl-number
composer install
```


## 📄 License

MIT License. See the LICENSE file for details.

---

## 📢 Author

**Simeon Michael**  
[GitHub Profile](https://github.com/sepolly)
