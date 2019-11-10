LOGIN
endpoint : localhost:3000/{outletID}/login
body :
-users_uname
-users_pass

ADD USER
endpoint : localhost:3000/{outletID}/addUser
body :
-users_outletID
-users_uname
-users_pass
-users_email
-users_role

ADD OUTLET
endpoint : localhost:3000/{outletID}/addUser
body :
-outlet_id
-outlet_role
-outlet_name
-outlet_desc
-outlet_address
