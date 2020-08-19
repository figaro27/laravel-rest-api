-/login, post
    format: x-www-fom-urlencoded
    request: { "email":"a@gmail.com", "password":"123456"}
    response: {"status": "success",
                "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYzdhOTcyMzk1ZWIxNWRiNzViZjdlYWIwYjExZmNkZTY4NGJhZDU2ZjhmZGU2ZjhjN2EzZjFiMDk4MTBiZGNkNGI5ZGZhZTE4MWY0ZWMxMzciLCJpYXQiOjE1OTc3NjU5MzUsIm5iZiI6MTU5Nzc2NTkzNSwiZXhwIjoxNjI5MzAxOTM1LCJzdWIiOiIzIiwic2NvcGVzI",
                "message": "Login success" }

-/register, post
    format: x-www-fom-urlencoded
    request: { "firstname":"li", "lastname":"lee", "email":"a@gmail.com", "password":"123456", "c_password":"123456"}
    response: {"status": "success",
                "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYzdhOTcyMzk1ZWIxNWRiNzViZjdlYWIwYjExZmNkZTY4NGJhZDU2ZjhmZGU2ZjhjN2EzZjFiMDk4MTBiZGNkNGI5ZGZhZTE4MWY0ZWMxMzciLCJpYXQiOjE1OTc3NjU5MzUsIm5iZiI6MTU5Nzc2NTkzNSwiZXhwIjoxNjI5MzAxOTM1LCJzdWIiOiIzIiwi",
                "message": "User registered successfully." }

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

-/lead/{id}, get
    header: Authorization
    response: {
        "lead": {
            "id": "9ab47d8c-4f2e-43c4-bea1-e3cb0ff8ff00",
            "personid": "33fb64cd-bea6-43c5-9d95-b56cff7987db",
        },
        "leaddetail": {
            "id": "9ab47d8c-4f2e-43c4-bea1-e3cb0ff8ff00",
            "personid": "33fb64cd-bea6-43c5-9d95-b56cff7987db",
            "email": "a@a.com",
            "besttimetocall": "best time to call",
            "hearaboutus": "hear about us",
            "howtocanwehelp": "how to can we help",
        },
        "person": {
            "id": "33fb64cd-bea6-43c5-9d95-b56cff7987db",
            "firstname": "per",
            "lastname": "per",
            "status": 1,
        },
        "address": [
                {
                "id": "ecbf51c8-6fcd-4c8d-b894-342cc0776757",
                "personid": "33fb64cd-bea6-43c5-9d95-b56cff7987db",
                "address1": "May St",
                "address2": null,
                "city": "Perth",
                "state": "AK",
                "zip": "13235",
                "primary": 1,
                }
            ]
        }
        "phone": [
                {
                "id": "ecbf51c8-6fcd-4c8d-b894-342cc0776757",
                "personid": "33fb64cd-bea6-43c5-9d95-b56cff7987db",
                "number": "0000",
                "primary": 1,
                }
            ]
        }
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
                    "company": "company",
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
                    "company": "company",
                }
            ]
        }
        ],
    }

-/phonetype, get
    response: {
        [
        {
            "phonetype": "cell"
        },
        {
            "phonetype": "home"
        },
        {
            "phonetype": "office"
        }
        ]
    }

-/phone, post
-/phone/{id}, put
    request: {"personid":"acef5eb6-381f", "number":"1234", "type":"home", "primary":1}
    response: { "id": "d632514e-01bf", "personid": "acef5eb6-381f", "number": "1234", "type": "home", "primary":1}

-/addresstype, get
    response: {
        [
        {
            "addresstype": "billing"
        },
        {
            "addresstype": "home"
        },
        {
            "addresstype": "main"
        },
        {
            "addresstype": "office"
        }
        ]
    }

-/address, post
-/address/{id}, put
    request: {"personid":"33fb64cd-bea6","address1":"May St", "address2":"St", "city":"Perth", "state":"AK", "zip":"13235", "primary":1}
    response: { "id": "ecbf51c8-6fcd-4c8d-b894-342cc0776757",
                "personid": "33fb64cd-bea6",
                "address1": "May St",
                "address2":"St",
                "city": "Perth",
                "state": "AK",
                "zip": "13235",
                "primary": 1,
                "created_by": 3,
            }



-/leaddetail, post
-/leaddetail/{id}, put
    header: Authorization
    request: {"leadid":"acef5eb6-381f-4f5c-855b-12bde5201b23",
                "email":"email@mail.com",
                "besttimetocall":"Morning",
                "hearaboutus":"How did you hear about us?",
                "howcanwehelp":"How can we help?"
            }
    response: {
                "id": "8bc8abe1-52b1-406a-9cd9-d6861a0f2df3",
                "leadid": "acef5eb6-381f-4f5c-855b-12bde5201b23",
                "email": "email@mail.com",
                "besttimetocall": "Morning",
                "hearaboutus": "How did you hear about us?",
                "howcanwehelp": "How can we help?",
            }

-/color, post
-/color/{id}, put
    header: Authorization
    request: {"name":"red"}
    response: {
            "status": "success",
            "id": "f968141f-2b68-4648-b5ac-8c50e636a311",
            "name": "redblack"
        }

-/colors, get
    response: {
        [
        {
            "id": "4f19cd65-2c3d-48b7-9444-aabfe694a5d3",
            "name": "red",
        },
        {
            "id": "c0487478-9951-4893-9072-a96d55ea70dc",
            "name": "white",
        },
        ]
    }

-/color/{id}, delete
    header: Authorization
    response: {
        "status": "success"
    }

-/pattern, post
-/pattern/{id}, put
    header: Authorization
    request: {"name":"pattern"}
    response: {
                "status": "success",
                "id": "8bc8abe1-52b1-406a-9cd9-d6861a0f2df3",
                "name": "pattern"
            }

-/patterns, get
    response: {
        [
        {
            "id": "4f19cd65-2c3d-48b7-9444-aabfe694a5d3",
            "name": "pattern",
        },
        {
            "id": "c0487478-9951-4893-9072-a96d55ea70dc",
            "name": "pattern",
        },
        ]
    }

-/pattern/{id}, delete
    header: Authorization
    response: {
        "status": "success"
    }

-/ingredient, post
-/ingredient/{id}, put
    header: Authorization
    request: {  "name":"Name",
                "coverage":4,
                "purchageprice":50,
                "color":["colorId1","colorId2"],
                "pattern":["patternId1","patternId2"]
            }
    response: {
                "id": "642cfdb4-6fd1-4e79-b137-1158d679306a",
                "name": "Name",
                "coverage": 4,
                "purchageprice": 60,
                "color":["colorId1","colorId2"],
                "pattern":["patternId1","patternId2"]
            }

-/ingredients, get
    response: {
        [
        {
            "id": "642cfdb4-6fd1-4e79-b137-1158d679306a",
            "name": "Name",
            "coverage": 4,
            "purchageprice": 60
        },
        {
            "id": "642cfdb4-6fd1-4e79-b137-1158d679306a",
            "name": "Name",
            "coverage": 4,
            "purchageprice": 60
        },
        ]
    }

-/ingredient/{id}, delete
    header: Authorization
    response: {
        "status": "success"
    }

-/ingredient/{id}, get
    response: { "name":"Name",
                "coverage":4,
                "purchageprice":50,
                "color":["colorId1","colorId2"],
                "pattern":["patternId1","patternId2"]}
            }

-/system, post
-/system/{id}, put
    header: Authorization
    request: {  "name":"test system",
                "saleprice":23,
                "ingredients":[
                    {"ingredientid":"id", "extra": "extra", "factor": "7", "price":30}
                ]
            }
    response: {
                "id": "642cfdb4-6fd1-4e79-b137-1158d679306a",
                "name":"test system",
                "saleprice":23
                "ingredients":[
                    {"ingredientid":"id", extra: "extra", "factor": "7", "price":30}
                ]
            }

-/system/{id}, get
    header: Authorization
    response: {
                "id": "642cfdb4-6fd1-4e79-b137-1158d679306a",
                "name":"test system",
                "saleprice":23
                "ingredients":[
                    {"ingredientid":"id", extra: "extra", "factor": "7", "price":30}
                ]
            }

-/system/{id}, delete
    header: Authorization
    response: {
        "status": "success"
    }

-/systems, get
    response: {
        [
        {
            "id": "642cfdb4-6fd1-4e79-b137-1158d679306a",
            "name": "Name"
        },
        {
             "id": "642cfdb4-6fd1-4e79-b137-1158d679306a",
            "name": "Name",
        },
        ]
    }

-/contracttemplate, post
-/contracttemplate/{id}, put
    request:{
        "name":"name",
        "logo": "logo",
        "notetocustomer": "notetocustomer",
        "scopeofwork": "scopeofwork",
        "commoncondition": "commoncondition",
        "downpaymentterms": "downpaymentterms",
        "note": "note",
        "conclusion": "conclusion",
        "footer": "footer"
    }
    response:{
        "id": "asdf-2342",
        "name":"name",
        "logo": "logo",
        "notetocustomer": "notetocustomer",
        "scopeofwork": "scopeofwork",
        "commoncondition": "commoncondition",
        "downpaymentterms": "downpaymentterms",
        "note": "note",
        "conclusion": "conclusion",
        "footer": "footer"
    }

-/contracttemplate/{id}, get
    response:{
            "id": "asdf-2342",
            "name":"name",
            "logo": "logo",
            "notetocustomer": "notetocustomer",
            "scopeofwork": "scopeofwork",
            "commoncondition": "commoncondition",
            "downpaymentterms": "downpaymentterms",
            "note": "note",
            "conclusion": "conclusion",
            "footer": "footer"
        }

-/contracttemplates, get
    response: {
        [
        {
            "id": "642cfdb4-6fd1-4e79-b137-1158d679306a",
            "name":"name",
            "logo": "logo",
            "notetocustomer": "notetocustomer",
            "scopeofwork": "scopeofwork",
            "commoncondition": "commoncondition",
            "downpaymentterms": "downpaymentterms",
            "note": "note",
            "conclusion": "conclusion",
            "footer": "footer"
        },
        {
             "id": "642cfdb4-6fd1-4e79-b137-1158d679306a",
            "name":"name",
            "logo": "logo",
            "notetocustomer": "notetocustomer",
            "scopeofwork": "scopeofwork",
            "commoncondition": "commoncondition",
            "downpaymentterms": "downpaymentterms",
            "note": "note",
            "conclusion": "conclusion",
            "footer": "footer"
        },
        ]
    }

-/contracttemplate/{id}, delete
    header: Authorization
    response: {
        "status": "success"
    }











