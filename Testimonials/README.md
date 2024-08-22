## Aditya_Testimonials Magento 2 Module

- The Aditya_Testimonials module allows Magento 2 administrators to manage customer testimonials. 
- The module provides basic CRUD (Create, Read, Update, Delete) functionality via the Magento admin panel.
- Offers a REST API endpoint to retrieve testimonials with optional filtering and pagination.

# Features : 

- Admin Management: Manage customer testimonials through the Magento admin panel.
- Database Integration: Stores testimonials in a custom database table.
- REST API: Exposes a REST API endpoint to retrieve testimonials with support for filtering by rating and 
            limiting the number of results.
- Frontend Display: Displays testimonials on a CMS page.

# Installation : 

- php bin/magento module:enable Aditya_Testimonials
- php bin/magento setup:upgrade
- php bin/magento setup:di:compile
- php bin/magento setup:static-content:deploy

# Database Setup : 

- The module will automatically create a database table named aditya_testimonials with the following columns:

-> testimonial_id (Primary Key, Auto Increment)
-> customer_name (varchar, 255)
-> testimonial_content (text)
-> rating (int, range 1-5)
-> created_at (timestamp)

# Admin UI : 

- The module adds a new menu item under Content in the Magento Admin named **Aditya > Testimonials.**

# Grid View : 

- The grid lists all testimonials with options to filter, sort, and search by customer_name and rating. 
- You can Add, Edit, and Delete testimonials using the provided actions.

# Form : 

- The form for adding and editing testimonials includes the following fields:

-> Customer Name: Text field (required)
-> Testimonial Content: Textarea (required)
-> Rating: Dropdown with values from 1 to 5 (required)

# Frontend Display : 

- The module includes a frontend block that displays a list of testimonials on a CMS page. 
- The testimonials are displayed in a simple layout, showing the Customer Name, Testimonial Content, and Rating.

- Create Cms page > Content > Pages > 

# Example : 
- Testimonials Page
- Create Testimonials custom block and add below block in it :  

**{{block class="Aditya\Testimonials\Block\Testimonials" name="testimonials" template="Aditya_Testimonials::aditya/testimonials.phtml"}}**

- And assign this block to Testimonials Page > Add Content > Block > Assign > Testimonials custom block > Save
- Go to https://your-domain/testimonials

# REST API Endpoint : 

- The module provides a REST API endpoint to retrieve the list of testimonials in JSON format. 
- The API supports filtering by rating and limiting the number of testimonials returned.

# API Endpoint : 

-> URL: /rest/V1/testimonials
-> Method: GET

# Usage Examples : 

1. Retrieve All Testimonials
   To fetch all testimonials without any filters:

Request URL: **https://<your-domain>/rest/V1/testimonials?searchCriteria=**


2. Filter Testimonials by Rating and Limit Results
   To retrieve testimonials with a rating of 5 and limit the results to 3:

Request URL: **https://<your-domain>/rest/V1/testimonials?searchCriteria[filterGroups][0][filters][0][field]=rating&searchCriteria[filterGroups][0][filters][0][value]=5&searchCriteria[pageSize]=3**
