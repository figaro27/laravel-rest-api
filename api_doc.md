-/login, post
    format: x-www-fom-urlencoded
    request: { 'email':'a@gmail.com', 'password':'123456'}
    response: {'status': 'success',
                'token': 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYzdhOTcyMzk1ZWIxNWRiNzViZjdlYWIwYjExZmNkZTY4NGJhZDU2ZjhmZGU2ZjhjN2EzZjFiMDk4MTBiZGNkNGI5ZGZhZTE4MWY0ZWMxMzciLCJpYXQiOjE1OTc3NjU5MzUsIm5iZiI6MTU5Nzc2NTkzNSwiZXhwIjoxNjI5MzAxOTM1LCJzdWIiOiIzIiwic2NvcGVzI',
                'message': 'Login success' }

-/register, post
    format: x-www-fom-urlencoded
    request: { 'firstname':'li', 'lastname':'lee', 'email':'a@gmail.com', 'password':'123456', 'c_password':'123456'}
    response: {'status': 'success',
                'token': 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYzdhOTcyMzk1ZWIxNWRiNzViZjdlYWIwYjExZmNkZTY4NGJhZDU2ZjhmZGU2ZjhjN2EzZjFiMDk4MTBiZGNkNGI5ZGZhZTE4MWY0ZWMxMzciLCJpYXQiOjE1OTc3NjU5MzUsIm5iZiI6MTU5Nzc2NTkzNSwiZXhwIjoxNjI5MzAxOTM1LCJzdWIiOiIzIiwi',
                'message': 'User registered successfully.' }

-/person, post
-/person/{id}, put
    header: Authorization
    request: {"firstname":"firstName","lastname":"lastName","company":"company"}
    response: {
                "firstname": "firstName",
                "lastname": "lastName",
                "company": "company",
                "created_by": "userid",
                "updated_by": "userid",
                "id": "d2876bef-a6fb-4a11-86bc-901fd877d034",
                "updated_at": "2020-08-12 15:39:30",
                "created_at": "2020-08-12 15:39:30"
            }

-/lead, post
    header: Authorization
    request: {"personid":"33fb64cd-bea6-43c5-9d95-b56cff7987db"}
    response: {
        "id": "9ab47d8c-4f2e-43c4-bea1-e3cb0ff8ff00",
        "personid": "33fb64cd-bea6-43c5-9d95-b56cff7987db",
        "created_by": "user",
        "updated_by": "user",
        "updated_at": "2020-08-18 02:47:35",
        "created_at": "2020-08-18 02:47:35"
    }

-/lead/{id}, delete
    header: Authorization
    response: {
        "status": "success"
    }

-/leads, get
    header: Authorization
    response: {
        [
        {
            "id": "idtest1",
            "personid": "personidtest1",
            "person": [
                {
                    "id": "personidtest1",
                    "firstname": "person1",
                    "lastname": "pserson1",
                    "company": null,
                }
            ]
        },
        {
            "id": "test3",
            "personid": "personidtest3",
            "person": [
                {
                    "id": "personidtest3",
                    "firstname": "person3",
                    "lastname": "person3",
                    "company": null,
                }
            ]
        }
        ],
    }



