# Medications REST API

## **Endpoints**

### **Get all Medications (GET)**

**Response:**

```
code: 200
```

```json
[
    {
        "name": "Paracetamol",
        "started_at": "2024-02-21 08:00:00",
        "dosage": 500,
        "note": "Take after meals"
    }
]
```

### **Add a Medication (POST)**

**Endpoint:** `POST /medications`
**Request Body:**

```json
{
    "name": "Paracetamol",
    "started_at": "2024-02-21 08:00:00",
    "dosage": 500,
    "note": "Take after meals"
}
```

**Response:**

```
code: 201
```

```json
{
    "name": "Paracetamol",
    "started_at": "2024-02-21 08:00:00",
    "dosage": 500,
    "note": "Take after meals"
}
```

---

### **Update a Medication (PUT)**

**Endpoint:** `PUT /medications/1`
**Request Body:**

```json
{
    "name": "Ibuprofen",
    "started_at": "2024-02-21 09:00:00",
    "dosage": 400,
    "note": "Take with water"
}
```

**Response:**

```
code: 200
```
```json
{
    "name": "Ibuprofen",
    "started_at": "2024-02-21 09:00:00",
    "dosage": 400,
    "note": "Take with water"
}
```

---

### **Delete a Medication (DELETE)**

**Endpoint:** `DELETE /medications/1`
**Response:**

```
code: 200
```

```json
{
    "message": "Medication id 3 deleted"
}
```

**Response:**
```
code: 404
```

```json
{
    "message": "Medication id 3 not found"
}
```

---

## **Project Setup**

Copy environment file

```
cp env.dist .env
```

Start the Docker environment:

```
make up
```

Install dependencies using Composer:

```
make composer-install
```

To stop the Docker environment:

```
make down
```

---

## **Application Host**

Add the following entry to your `/etc/hosts` file:

```
apo.test
```

---

## **Database Initialization**

The database is initialized using the following script, which creates the necessary tables and inserts sample data:

```sql
CREATE TABLE medications (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    started_at DATETIME NOT NULL,
    dosage INT NOT NULL,
    note VARCHAR(500)
);

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    type VARCHAR(50) NOT NULL
);

INSERT INTO users (name, type) VALUES
('Alice', 'customer'),
('Bob', 'customer'),
('Charlie', 'pharmacist'),
('David', 'pharmacist'),
('Emma', 'customer');

INSERT INTO medications (name, started_at, dosage, note) VALUES
('Ibuprofen', '2024-02-01 08:00:00', 200, 'Take after meals.'),
('Amoxicillin', '2024-02-10 12:00:00', 500, 'Finish the full course.'),
('Metformin', '2024-01-15 07:30:00', 1000, 'Take with breakfast.'),
('Lisinopril', '2024-02-05 09:00:00', 10, 'Monitor blood pressure.'),
('Atorvastatin', '2024-01-25 21:00:00', 20, 'Take before bed.');
```

---

## **User Handling**

User authentication is handled by including the `User-ID` key in the request header, with the corresponding user ID from the database as its value. This allows the controller to determine if the user is a customer or a pharmacist.

### **Test Users**

| ID  | Name    | Type       |
|-----|---------|------------|
| 1   | Alice   | Customer   |
| 2   | Bob     | Customer   |
| 3   | Charlie | Pharmacist |
| 4   | David   | Pharmacist |
| 5   | Emma    | Customer   |

---

## **Tests**

Unit tests (happy path) have been implemented using PHPUnit. You can run them with:

```
make phpunit
```

## **Code Analisys**

Static code analysis has been added using PHPStan. You can run it with:

```
make phpstan
```

## **Dependencies**

- **Router** [steampixel/simple-php-router](https://github.com/steampixel/simplePHPRouter)
- **Querybuilder** [clancats/hydrahon](https://github.com/ClanCats/Hydrahon)
- **Environment Autoloader** [vlucas/phpdotenv](https://github.com/vlucas/phpdotenv)