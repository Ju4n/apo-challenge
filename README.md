# Medications REST API

## **Endpoints**

### **Add a Medication (POST)**

- **Endpoint:** `POST /medications`
- **Request Body:**
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

you can set docker just running

```
make up
```

you can run composer install running

```
make composer-install
```


### Not implemented
- Database initialization
- Get one Medication in Repository and Service
- User Handling
- Tests