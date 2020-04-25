SMS API
[Built with Spacemacs]

Application Description
This is a simple API built to enable users send and recieve sms messages

Features
Below are the features of my WEconnect app

Contact can be created
Users can send sms
Users can recieve sms

Technologies used
Modern JavaScript technologies were adopted for this project

ES2015: Also known as ES6 or ES2015 or ECMASCRIPT 6, is a new and widely used version of Javascript that makes it compete healthily with other languages. See here for more infromation.

NodeJS: Node.js is an open-source, cross-platform JavaScript run-time environment which allows you enjoy the features of Javascript off the web browsers and implement server-side web development. Visit here for more information.

ExressJS: This is the web application framework for Node.js Visit here for more information

MongoDB: MongoDB is a cross-platform document-oriented database program. Classified as a NoSQL database program, MongoDB uses JSON-like documents with schemata. Visit here for more information

Codes are written in accordance with Airbnb JavaScript style guide, see here for details.

Installation
Clone this repository into your local machine:
git clone https://github.com/seunzone/node-sms-API.git
Install dependencies
yarn install
Start the development application by running
yarn run dev
Create a .env file in the root of your project and insert See a sample in the .env.sample Fill in the sample data with your prefared parameters

Install postman to test all endpoints

API Routes
HTTP VERB	ENDPOINT	FUNCTIONALITY
POST	/api/v1/contacts	Creates a contact
POST	/api/v1/sms/:contactId	Sends SMS
GET	/api/v1/sms/sent/:contactId	View a users sent SMS
GET	/api/v1/sms/recieved/:contactId	View recieved SMS
GET	/api/v1/contacts	Gets all contacts
GET	/api/v1/sms	Gets all sms
