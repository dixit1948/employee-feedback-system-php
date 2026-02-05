# 🚀 Employee Feedback System (PHP & MySQL)

A secure and user-friendly **Employee Feedback System** built using **Core PHP and MySQL**.
This system allows organizations to collect structured, emoji-based feedback from employees with **one-time submission control** and secure identity mapping.

---

## 📌 Project Overview

Companies often need anonymous or semi-anonymous feedback from employees to evaluate workplace satisfaction, culture, and performance.
This system simplifies the process with:

* Preloaded employee database (1200+ records)
* Emoji-based survey questions
* Secure submission tracking
* Tokenized identity mapping

---

## ✨ Key Features

* 📥 Import **1200+ employees via CSV**
* 👤 Employee selection without exposing internal mapping
* 🔐 One-time feedback submission
* 🆔 Custom readable token generation (`abc1234`)
* 😀 Emoji-based rating system (5 Questions × 10 Emojis)
* 🧾 Automatic submission logging
* 🚫 Duplicate submission prevention
* 📊 Admin can map employee ↔ feedback
* 📱 Responsive & clean UI

---

## 🛠️ Tech Stack

| Layer    | Technology            |
| -------- | --------------------- |
| Frontend | HTML, CSS, JavaScript |
| Backend  | Core PHP              |
| Database | MySQL                 |
| Server   | Apache (XAMPP/WAMP)   |

---

## 📂 Project Structure

```
employee-feedback-system-php/
│── employee_feedback_system.sql                  # Database schema
│── db.php                  # DB connection
│── employees_1200.csv      # Employee dataset
│── import_csv.php          # CSV import script
│── form.php                # Feedback form UI
│── submit.php              # Submission logic
│── thankyou.php            # Confirmation page
│── README.md
```

---

## ⚙️ Installation & Setup

### 1️⃣ Clone Repository

```bash
git clone https://github.com/dixit1948/employee-feedback-system-php.git
```

### 2️⃣ Move to Server Directory

```
htdocs/employee-feedback-system-php
```

### 3️⃣ Start XAMPP / WAMP

* Apache ✅
* MySQL ✅

### 4️⃣ Import Database

Open phpMyAdmin → Run:

```
db.sql
```

### 5️⃣ Import Employees

```
http://localhost/employee-feedback-system-php/import_csv.php
```

### 6️⃣ Open Feedback Form

```
http://localhost/employee-feedback-system-php/form.php
```

---

## 🔐 Submission Workflow

1. Employees preloaded via CSV
2. `url_token` initially NULL
3. Employee submits feedback
4. System generates unique token (e.g. `abc1234`)
5. Feedback stored in database
6. Employee locked from resubmission

---

## 🧩 Token Format

Example token:

```
abc1234
```

Structure:

* 3 Random letters
* 4 Random digits
* Human-readable & unique

---

## 🧪 Use Cases

* Employee Satisfaction Surveys
* HR Internal Reviews
* Workplace Environment Analysis
* Anonymous Company Feedback
* Performance Culture Studies

---

## 🔮 Future Enhancements

* Admin Dashboard Panel
* Excel Export Reports
* Email / OTP Verification
* Multi-round Feedback System
* Analytics Charts
* Department-wise Reports

---

## 📜 License

This project is open-source and free to use for:

* Educational purposes
* Internal company surveys
* Portfolio demonstrations

---

## 👨‍💻 Developed By

**Dixit Pedhadiya**

Full-Stack Web Developer 

GitHub: [https://github.com/dixit1948](https://github.com/dixit1948)

---

⭐ If you like this project, don’t forget to star the repository!
=======
# employee-feedback-system-php
Secure Employee Feedback System built with PHP &amp; MySQL
>>>>>>> 995471ee8bfb5dec647c6da75f0a0ad7fa995f97



