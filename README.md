# Medications REST API

## **Endpoints**

### **Add a Medication (POST)**

- **Endpoint:** `POST /medications`
- **Request Body:**
```json
{
    "name": "Paracetamol",
    "started_at": "2024-02-21 08:00:00",
    "dosage": 500,
    "note": "Take after meals"
}
```
- **Response:**
```json
{
"status": "success",
"message": "Medication added successfully",
"data": {
    "id": 1,
    "name": "Paracetamol",
    "started_at": "2024-02-21 08:00:00",
    "dosage": 500,
    "note": "Take after meals"
    }
}
```

---

### **Update a Medication (PUT)**

- **Endpoint:** `PUT /medications/1`
- **Request Body:**
```json
{
    "name": "Ibuprofen",
    "started_at": "2024-02-21 09:00:00",
    "dosage": 400,
    "note": "Take with water"
}
```
- **Response:**
```json
{
"status": "success",
"message": "Medication updated successfully",
"data": {
    "id": 1,
    "name": "Ibuprofen",
    "started_at": "2024-02-21 09:00:00",
    "dosage": 400,
    "note": "Take with water"
    }
}
```

---

### **Delete a Medication (DELETE)**

- **Endpoint:** `DELETE /medications/1`
- **Response:**
```json
{
    "status": "success",
    "message": "Medication deleted successfully"
}
```

---

## **Error Responses**

- **Invalid Request:**
```json
{
    "status": "error",
    "message": "Invalid request parameters"
}
```
- **Medication Not Found:**
```json
{
    "status": "error",
    "message": "Medication not found"
}
```

### Project

you can set docker running

```
make up
```

you can stop docker running

```
make down
```

you can run composer install running

```
make composer-install
```

### application host

add this to /etc/hosts

```
apo.test
```



### Not implemented
- Database initialization
- Get one Medication in Repository and Service
- User Handling
- Tests

**Note:** If you want to see a finished and working version, with more or less everything implemented (obviously using much more than 3 hours), you can check out this [branch](https://github.com/Ju4n/apo-challenge/tree/feature/crud-complete). I fixed the errors I couldn't fix before and completed everything because I thought it would be fun.
