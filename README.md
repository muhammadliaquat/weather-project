🟢 <h1>Milestone 1 – Project Description</h1>
<b>Overview</b>

The Weather Data Analytics & Search Platform is a REST-based web application designed to store, index, search, and analyze historical weather data using Elasticsearch. The system allows users to perform CRUD operations on weather records and retrieve analytical insights such as hottest cities, rainfall trends, and seasonal patterns.

<b>Technologies Used</b>

Backend: PHP (XAMPP)

Database/Search Engine: Elasticsearch

API Documentation: Swagger (OpenAPI)

API Testing: Postman

Frontend: HTML, CSS, JavaScript

Visualization: Chart.js


🟢 <h1>Milestone 2 – Use Case List</h1>
<b>Actors</b>

-User
-Developer(Me)
-System (Elasticsearch)

<b>Use Cases</b>
UC-1: Insert Weather Data

User inserts weather data (city, temperature, rainfall etc).

System stores data in Elasticsearch.

UC-2: Search Weather Data

User searches weather data by city.

System retrieves matching records.

UC-3: Update Weather Data

User updates an existing weather record.

System updates document in Elasticsearch.

UC-4: Delete Weather Data

User deletes a weather record by ID.

UC-5: View Hottest Cities

User retrieves analytics showing cities with highest temperatures.

UC-6: Visual Analytics

User views weather analytics via charts.

🟢 <h1>Milestone 3 – REST API & Swagger Documentation</h1>
REST API Endpoints
Endpoint	Method	Description
/weather	POST	Insert weather data
/weather/search	GET	Search by city
/weather/{id}	PUT	Update weather
/weather/{id}	DELETE	Delete weather
/analytics/hottest	GET	Hottest cities
Swagger Role

Defines request/response schemas

📁 Location:

swagger/openapi.yaml

🟢 <h1>Milestone 4 – Elasticsearch Mapping</h1>
Index Name
weather

Mapping Definition
{
  "mappings": {
    "properties": {
      "city": { "type": "text", "fields": { "keyword": { "type": "keyword" } } },
      "country": { "type": "keyword" },
      "date": { "type": "date" },
      "temperature": { "type": "float" },
      "rainfall": { "type": "float" },
      "season": { "type": "keyword" }
    }
  }
}

Purpose

Enables fast search

Supports aggregations

Optimized analytics queries

🟢 <h1>Milestone 5 – Implementation </h1>

<b>Backend</b>

PHP REST API using cURL

Secure Elasticsearch communication

Supports CRUD operations

Implements analytics queries

<b>Frontend</b>

Separate UI for:

Insert

Search

Update

Delete

Analytics

Clean CSS styling

Chart.js visualizations

Data Handling

JSON-based communication

Elasticsearch document storage

🟢 <h1>Milestone 6 – Postman Testing</h1>
Tested Operations

POST: Insert weather data

GET: Search weather data

PUT: Update weather data

DELETE: Delete weather data

GET: Analytics queries

Evidence

Postman request screenshots

JSON responses

Status codes verification

...
📂 Final GitHub Project Structure
weather-project/
├── api/
│   └── index.php
├── frontend/
│   ├── index.html
│   ├── style.css
│   └── app.js
├── data/
│   └── weather_dataset_expanded.csv
├── swagger/
│   └── openapi.yaml
├── README.md
...
