<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://github.com/Geovanka/Project_WebProg/blob/main/SponstoreLogo.jpeg?raw=true" width="400" alt="Laravel Logo"></a></p>

# Documentation

## Team Members and Responsibilities

### 1. **Geovanka Thersia Kurniawan** (NIM: 2602123572)
   - **Responsibilities**: 
     - **Profile Page**: Developed and implemented the UI to display the student organization profile and integrated functionality to showcase their events.
     - **Add Event Feature**: Designed and coded the event submission form and ensured the events dynamically appear on the profile page.
     - **Inbox User Page**: Built the inbox system and integrated the feature to display sponsor negotiations.
     - **Sent Page**: Designed and developed a page to track all proposals submitted by student organizations to sponsors.
     - **Admin Page**: Created a dashboard for admins to view and manage sponsor profiles efficiently.
     - **Navbar Improvements**: Refactored the navigation bar to enhance visual appeal and usability.
     - **Home Page Enhancements**: Redesigned and structured the homepage layout to improve aethetics and user experience.
     - **Sponsor Profile Page**: Developed the UI and backend integration for sponsors to view and manage their profile upon login.

### 2. **Kent Christopher Hansel** (NIM: 2602067634)
   - **Responsibilities**: 
     - **ERD**: Designed the architecture of the entity relational database system.
     - **Migrations**: Created and configured all the table migrations (users, sponsors, events, admins, transactions) with each attribute for the project.
     - **Model**: Created and configured all the models used in the project (User, Sponsor, Event, Admin, Transaction).
     - **Seeder**: Created and configured the seeder for admin, and sponsor fakers.
     - **Authentication**: Handles all login activity, logout activity, and authentication functions of the project.
     - **Login/Register**: Created login and register view page, implemented authentication functions for account creation and account log in.
     - **Logout**: Created a log out function to log out logged in user from the website for session management.
     - **Navbar**: Implemented a personalization for the navbars for each roles and the routes the buttons give. Optimized the routing and redirects of the menu in the navbar.
     - **Admin**: Implemented addSponsor function to add new sponsor to the database for the user to see, implemented editSponsor to edit existing sponsor details, added a deleteSponsor function to delete the selected existing sponsor from the database. Implemented pagination to navigate through existing sponsors.
     - **Inbox/Inboxuser/Sent**: Implemented a functional search bar in inbox / inboxuser / sent page for the user to navigate through the page easier. Linked the users and sponsors related to the transaction shown so the other party could view the user/sponsor. Implemented a sort to show the transactions based on the most recent updated time. Implemented if condition for the transactions shown on the inboxuser page based on transaction's status.
     - **Storage**: Configured the storage settings to store inputted images and files in the file system.
     - **Error**: Implemented error handling for each validation in every form.
     - **Middleware**: Implemented middleware based on user role to increase security of the website.
     - **Routing**: Optimized the routing system, redirects, routing names for better readability and functionality.
     - **Environment**: Configured the environment settings for deployment purposes.
        
### 3. **Shanna Carlynda Fernlie** (NIM: 2602077843)
   - **Responsibilities**: 
     - **Home Page**: Design the structure with featured sponsors, events, and navigation, ensuring responsiveness and usability.
     - **Sponsor Profile**: Fetch sponsor data, design the UI, and provide proposal template for users.
     - **Proposal Submission**: Create a form to fetch event data, validate inputs, store submissions, and provide clear feedback.
     - **Inbox User**: Build a UI to display transactions with filters and search functionality.
     - **Inbox**: Design a UI to view received proposals with navigation and filters.
     - **Sent**: Create a UI to view sent proposals with status updates and search options.
     - **Footer**: Implement a consistent footer with links, social icons, and SDG references.
        
### 4. **Vincentius Axelle Tanoto** (NIM: 2602057690)
   - **Responsibilities**: 
     - **Search Bar**: Implement search bars on the navbar and in Inbox/Sent sections to search sponsors, events, or users.
     - **Proposal Status**: Add options for proposal status (Accepted, Rejected, Negotiated) and ensure users can track changes.
     - **Delete Confirmation Popup**: Implemented a confirmation modal for accept or reject the proposal.
     - **Error Page Design**: Created and styled an error page to handle unexpected issues, ensuring seamless redirection during errors.
     - **Documentation**: Create a comprehensive README.md file to document the features, setup, and usage of the system.



## About Sponstore

Sponstore is an innovative platform designed to simplify the process for student organizations to find and collaborate with sponsors for their events and activities. With integrated features, Sponstore streamlines sponsorship proposal submissions, communication, and management, making the process more efficient and transparent.

Sponstore aligns with Sustainable Development Goal (SDG) 17: Partnerships for the Goals, by connecting student organizations with potential sponsors to foster mutually beneficial collaborations. This platform strengthens strategic partnerships that contribute to the sustainability of positive initiatives within campus communities and beyond.



## Deployment

You can access the deployed website here:

[Sponstore Website](www.youtube.com)



## Entity Relationship Diagram (ERD)

The Entity Relationship Diagram (ERD) below illustrates the structure of the database used by Sponstore, highlighting the relationships between the entities.

![ERD](https://github.com/Geovanka/Project_WebProg/blob/main/ERD_Sponstore.png?raw=true)



## Website Layout, Structure, and Functions

### 1. Create Account
Users can create an account by providing essential information such as their organization name, email address, and password. After successful registration, users will be able to log in to the platform and access various features, including event creation and sponsorship proposal management.

![Create Account Screenshot](https://github.com/Geovanka/Project_WebProg/blob/main/createacc.jpeg?raw=true)

### 2. Login Account
Once an account has been created, users can log in using their registered email address and password. After logging in, they will be redirected to their **Dashboard** or **Home Page**, where they can manage events and sponsorship proposals.

![Login Screenshot](https://github.com/Geovanka/Project_WebProg/blob/main/login.jpeg?raw=true)

### 3. Profile Page
The **Profile Page** provides details for both student organizations and sponsors:
#### For Student Organizations (Users):
- **Organization Name**: The name of the student organization.
- **Email**: The email address of the user.
- **Event Name**: The names of events created by the user.
- **Event Date**: The scheduled date for each event.
- **Event Description**: Descriptions of the events.
- **Event Location**: The location where the events will take place.

![Profile Page1](https://github.com/Geovanka/Project_WebProg/blob/main/public/assets/images/profilepage.jpeg?raw=true)

#### For Sponsors:
- **Sponsor Name**: The name of the sponsor.
- **Email**: The contact email of the sponsor.
- **Image**: A logo or representative image of the sponsor.
- **Short Description**: A brief overview of the sponsor's interests or sponsorship preferences.

![Profile Page2](https://github.com/Geovanka/Project_WebProg/blob/main/public/assets/images/profilepage2.jpeg?raw=true)

### 4. Add Event
On the **Add Event** page, users can create a new event by filling out a simple form with the following fields:
- **Event Name**: The title of the event.
- **Event Date**: The date of the event.
- **Event Description**: A brief description of the event.
- **Event Location**: The location where the event will take place.

![Add Event](https://github.com/Geovanka/Project_WebProg/blob/main/public/assets/images/addevent.jpeg?raw=true)

### 5. Home Page
The **Home Page** is where users can:
- **View List of Sponsors**: Browse through a list of available sponsors.
- **Submit Sponsorship Proposals**: Users can select a sponsor from the list, fill out a proposal form, and attach the proposal document.
  - The proposal form includes fields such as **Event Name**, **Event Date**, **Event Description**, and **Location**.
  - The user can submit the proposal directly to the selected sponsor from this page.

![Home Page1](https://github.com/Geovanka/Project_WebProg/blob/main/public/assets/images/home1.jpeg?raw=true)
![Home Page2](https://github.com/Geovanka/Project_WebProg/blob/main/public/assets/images/home2.jpeg?raw=true)
![Home Page3](https://github.com/Geovanka/Project_WebProg/blob/main/public/assets/images/home3.jpeg?raw=true)
![Home Page3_5](https://github.com/Geovanka/Project_WebProg/blob/main/public/assets/images/home3_5.jpeg?raw=true)
![Home Page4](https://github.com/Geovanka/Project_WebProg/blob/main/public/assets/images/home4.jpeg?raw=true)

### 6. Sent Page
The **Sent Page** allows users to view the list of sponsorship proposals they have submitted. On this page, users can see:
- The **status** of each proposal (Accepted, Rejected, or On Check).
- The **Event Name** and **Date** associated with each proposal.
- **Status Update**: Users can track which proposals have been accepted, rejected, or are still under review.

![Sent Page](https://github.com/Geovanka/Project_WebProg/blob/main/public/assets/images/sent.jpeg?raw=true)

### 7. Inbox Page
The **Inbox Page** displays proposals that have been sent to sponsors and allows sponsors to interact with these proposals. The features include:
- **View Proposal**: Sponsors can open and review the details of the proposals submitted to them.
- **Accept/Reject/Negotiate**: Sponsors can take action on proposals:
  - **Accept**: If the proposal is approved, it will be marked as accepted.
  - **Reject**: If the proposal is declined, it will be marked as rejected.
  - **Negotiate**: If the sponsor wants to negotiate, they can provide notes for the organization, which are displayed in the user’s **Inbox**.
  
![Inbox Page1](https://github.com/Geovanka/Project_WebProg/blob/main/public/assets/images/inbox1.jpeg?raw=true)

- **Negotiation Notes**: If the sponsor selects the **Negotiate** option, they can leave notes that will be visible to the user. The user can view the status and negotiation notes on the **Inbox Page**.

![Inbox Page2](https://github.com/Geovanka/Project_WebProg/blob/main/public/assets/images/inbox2.jpeg?raw=true)

### 8. Admin Page
The **Admin Page** is designed for administrators to manage the sponsor list and maintain the platform:
- **Add Sponsor**: Admins can add new sponsors to the database with relevant details such as the sponsor name, contact information, and sponsorship categories.
- **Edit Sponsor Details**: Admins can update the details of existing sponsors, such as changing their contact information or sponsorship preferences.
- **Delete Sponsor**: Admins can remove sponsors from the list of available sponsors if they are no longer active or if their details need to be updated.

![Admin Page](https://github.com/Geovanka/Project_WebProg/blob/main/public/assets/images/admin.jpeg?raw=true)



## Main Features Description

### 1. Event Creation (User - Student Organization)

User (student organizations) can create events by providing the following details:
- **Event Name**: The title of the event.
- **Event Date**: The date when the event will take place.
- **Event Description**: A brief summary of the event, its purpose, and what participants can expect.
- **Event Location**: The venue or location where the event will occur.

Once the event details are provided, users can save and submit the event to begin searching for sponsors.

### 2. Sponsorship Proposal Submission (User - Student Organization)
Users can select or search from a list of sponsors and then submit a proposal for the selected event. The process includes:
- **Sponsor Selection**: Search and choose sponsors from a predefined list.
- **Proposal Template**: Download a proposal template and fill in the necessary details.
- **Proposal Submission**: Submit the filled proposal directly to the selected sponsor, aligned with the chosen event.

After submission, users can view the status of their proposals under the **Sent** menu.

### 3. Sponsor Review and Interaction (Sponsor - Company)
Sponsors can review the submitted proposals and take the following actions:
- **View Proposal**: Sponsors can read through the details of the event and the sponsorship request.
- **Accept or Reject Proposal**: Sponsors can either accept or reject the proposal based on their interest.
- **Negotiation**: Sponsors can initiate negotiations by providing feedback or notes, which are sent to the user for further discussion.

### 4. Proposal Status and Negotiation (User - Student Organization)
Users can track the status of their proposals through the **Inbox** menu, where they can see:
- **Accepted**: Proposals that have been accepted by sponsors.
- **Rejected**: Proposals that have been declined by sponsors.
- **Negotiated**: Proposals that are under negotiation, along with notes or feedback provided by the sponsors for further discussion.

### 5. Admin Control over Sponsors (Admin)
Admins have full control over the sponsor database and can perform the following actions:
- **Add New Sponsor**: Admins can add new sponsors to the website list.
- **Edit Sponsor Details**: Admins can edit the information of existing sponsors, such as contact details, sponsorship categories, etc.
- **Remove Sponsor**: Admins have the ability to remove sponsors from the list of available sponsors.

