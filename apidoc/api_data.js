define({ "api": [
  {
    "type": "DELETE",
    "url": "/applicants_has_skills",
    "title": "4. Delete Applicants Skills",
    "name": "DeleteApplicantsHasSkills",
    "group": "Applicants_Skills",
    "version": "0.2.0",
    "permission": [
      {
        "name": "Applicant"
      }
    ],
    "description": "<p>Delete Applicants Skills. This is a descripton.</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "applicant_id",
            "description": "<p>Applicant ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "skill_id",
            "description": "<p>Skill ID.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Request-Data-Example:",
          "content": "{\n    \"applicant_id\": 4,\n    \"skill_id\": 4,\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>PUT message (Values: <code>Deleted</code>,<code>Error</code>).</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n    \"message\": \"Deleted\",\n}",
          "type": "json"
        }
      ]
    },
    "filename": "career_system/src/Controller/Api/ApplicantsHasSkillsController.php",
    "groupTitle": "Applicants_Skills",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "ApplicantsHasSkillsNotFound",
            "description": "<p>The <code>applicant_id</code> and <code>skill_id</code> of the ApplicantsHasSkills was not found.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 Not Found\n {\n     message: \"Record not found in table \"applicants_has_skills\"\",\n     url: \"/CareerSystemWebBased/career_system/api/applicants_has_skills\",\n     code: 404\n }",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "GET",
    "url": "/applicants_has_skills",
    "title": "1. Request All Applicants Skills information",
    "name": "GetApplicantsHasSkills",
    "group": "Applicants_Skills",
    "version": "0.2.0",
    "permission": [
      {
        "name": "Applicant"
      }
    ],
    "description": "<p>Request All Applicants Skills information. This is a descripton.</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "applicant_id",
            "description": "<p>Applicant ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "skill_id",
            "description": "<p>Skill ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "size": "1-*",
            "optional": true,
            "field": "limit",
            "defaultValue": "20",
            "description": "<p>Number of results.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "size": "1-*",
            "optional": true,
            "field": "page",
            "defaultValue": "1",
            "description": "<p>Paginate page.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "allowedValues": [
              "asc",
              "desc"
            ],
            "optional": true,
            "field": "direction",
            "defaultValue": "asc",
            "description": "<p>Sort direction.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "allowedValues": [
              "applicant_id",
              "skill_id",
              "skill_level"
            ],
            "optional": true,
            "field": "sort",
            "defaultValue": "id",
            "description": "<p>Sort by field.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "applicantsHasSkills",
            "description": "<p>List of Applicants Skills (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "applicantsHasSkills.applicant_id",
            "description": "<p>Applicant ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "applicantsHasSkills.skill_id",
            "description": "<p>Skill ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "applicantsHasSkills.skill_level",
            "description": "<p>Level of skill.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n {\n     \"applicantsHasSkills\": [\n          {\n              \"applicant_id\": 4,\n              \"skill_id\": 4,\n              \"skill_level\": 5,\n          }\n     ]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "career_system/src/Controller/Api/ApplicantsHasSkillsController.php",
    "groupTitle": "Applicants_Skills"
  },
  {
    "type": "POST",
    "url": "/applicants_has_skills",
    "title": "2. Create a new Applicants Skills",
    "name": "PostApplicantsHasSkills",
    "group": "Applicants_Skills",
    "version": "0.2.0",
    "permission": [
      {
        "name": "Applicant"
      }
    ],
    "description": "<p>Create a new Applicants Skills. This is a descripton.</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "applicant_id",
            "description": "<p>Applicant ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "skill_id",
            "description": "<p>Skill ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "skill_level",
            "description": "<p>Skill level.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Request-Data-Example:",
          "content": "{\n    \"applicant_id\": 4,\n    \"skill_id\": 4,\n    \"skill_level\": 5,\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>POST message (Values: <code>Saved</code>,<code>Error</code>).</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "applicantsHasSkill",
            "description": "<p>Applicants Skills Objects.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "applicantsHasSkill.applicant_id",
            "description": "<p>Applicant ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "applicantsHasSkill.skill_id",
            "description": "<p>Skill ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "applicantsHasSkill.skill_level",
            "description": "<p>Skill level.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n    \"message\": \"Saved\",\n    \"applicantsHasSkill\": {\n        \"applicant_id\": 4,\n        \"skill_id\": 4,\n        \"skill_level\": 5,\n    }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "career_system/src/Controller/Api/ApplicantsHasSkillsController.php",
    "groupTitle": "Applicants_Skills"
  },
  {
    "type": "PUT",
    "url": "/applicants_has_skills",
    "title": "3. Modify Applicants Skills",
    "name": "PutApplicantsHasSkills",
    "group": "Applicants_Skills",
    "version": "0.2.0",
    "permission": [
      {
        "name": "Applicant"
      }
    ],
    "description": "<p>Modify Applicants Skills. This is a descripton.</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "applicant_id",
            "description": "<p>Applicant ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "skill_id",
            "description": "<p>Skill ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "skill_level",
            "description": "<p>Skill level.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Request-Data-Example:",
          "content": "{\n    \"applicant_id\": 4,\n    \"skill_id\": 4,\n    \"skill_level\": 5,\n}",
          "type": "json"
        }
      ]
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>PUT message (Values: <code>Saved</code>,<code>Error</code>).</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "applicantsHasSkill",
            "description": "<p>Applicants Skills Objects.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "applicantsHasSkill.applicant_id",
            "description": "<p>Applicant ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "applicantsHasSkill.skill_id",
            "description": "<p>Skill ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "applicantsHasSkill.skill_level",
            "description": "<p>Skill level.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n    \"message\": \"Saved\",\n    \"applicantsHasSkill\": {\n        \"applicant_id\": 4\n        \"skill_id\": 4,\n        \"skill_level\": 3,\n    }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "career_system/src/Controller/Api/ApplicantsHasSkillsController.php",
    "groupTitle": "Applicants_Skills",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "ApplicantsHasSkillsNotFound",
            "description": "<p>The <code>applicant_id</code> and <code>skill_id</code> of the ApplicantsHasSkills was not found.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 Not Found\n {\n     message: \"Record not found in table \"applicants_has_skills\"\",\n     url: \"/CareerSystemWebBased/career_system/api/applicants_has_skills\",\n     code: 404\n }",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "GET",
    "url": "/categories",
    "title": "1. Request All Categories information",
    "name": "GetCategories",
    "group": "Category",
    "version": "0.2.0",
    "permission": [
      {
        "name": "none"
      }
    ],
    "description": "<p>Request All Categories information. This is a descripton.</p>",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "categories",
            "description": "<p>List of categories (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "categories.id",
            "description": "<p>Post ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "categories.category_name",
            "description": "<p>Post title.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "categories.category_description",
            "description": "<p>Post content.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "categories.parent_id",
            "description": "<p>Job's salary.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "categories.lft",
            "description": "<p>Job's location.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "categories.rght",
            "description": "<p>Created date.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n {\n     \"categories\": [\n          {\n              \"id\": 2,\n              \"category_name\": \"Accounting\",\n              \"category_description\": \"Description here\",\n              \"parent_id\": 1,\n              \"lft\": 2,\n              \"rght\": 3\n          }\n     ]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "career_system/src/Controller/Api/CategoriesController.php",
    "groupTitle": "Category",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "size": "1-*",
            "optional": true,
            "field": "limit",
            "defaultValue": "20",
            "description": "<p>Number of results.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "size": "1-*",
            "optional": true,
            "field": "page",
            "defaultValue": "1",
            "description": "<p>Paginate page.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "allowedValues": [
              "asc",
              "desc"
            ],
            "optional": true,
            "field": "direction",
            "defaultValue": "asc",
            "description": "<p>Sort direction.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "allowedValues": [
              "id",
              "category_name",
              "category_description",
              "parent_id"
            ],
            "optional": true,
            "field": "sort",
            "defaultValue": "id",
            "description": "<p>Sort by field.</p>"
          }
        ]
      }
    }
  },
  {
    "type": "GET",
    "url": "/feedbacks/:id",
    "title": "2. Request Feedback information",
    "name": "GetFeedback",
    "group": "Feedback",
    "version": "0.2.0",
    "permission": [
      {
        "name": "Admin"
      }
    ],
    "description": "<p>Request Feedbacks information. This is a descripton.</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Feedbacks ID.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "feedback",
            "description": "<p>Feedback Objects.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "feedback.id",
            "description": "<p>Feedback ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "feedback.feedback_title",
            "description": "<p>Feedback title.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "feedback.feedback_comment",
            "description": "<p>Feedback comment.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "feedback.feedback_date",
            "description": "<p>Created date.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "feedback.feedback_result",
            "description": "<p>Feedback result.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "feedback.feedback_type_id",
            "description": "<p>Feedback type ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "feedback.user_id",
            "description": "<p>User ID.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n {\n     \"feedback\": {\n         \"id\": 1,\n         \"feedback_title\": \"About the menu bar\",\n         \"feedback_comment\": \"The top menu bar is not show in Post Page.\",\n         \"feedback_date\": \"2016-03-02T00:00:00+0000\",\n         \"feedback_result\": \"Thank you. We'll fix it soon.\",\n         \"feedback_type_id\": 1,\n         \"user_id\": 1\n     }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "career_system/src/Controller/Api/FeedbacksController.php",
    "groupTitle": "Feedback",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "FeedbackNotFound",
            "description": "<p>The <code>id</code> of the Feedback was not found.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 Not Found\n {\n     message: \"Record not found in table \"feedbacks\"\",\n     url: \"/CareerSystemWebBased/career_system/api/feedbacks/0\",\n     code: 404\n }",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "GET",
    "url": "/feedbacks",
    "title": "1. Request All Feedbacks information",
    "name": "GetFeedbacks",
    "group": "Feedback",
    "version": "0.2.0",
    "permission": [
      {
        "name": "Admin"
      }
    ],
    "description": "<p>Request All Feedbacks information. This is a descripton.</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "user_id",
            "description": "<p>User ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "feedback_type_id",
            "description": "<p>Feedback Type ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "size": "1-*",
            "optional": true,
            "field": "limit",
            "defaultValue": "20",
            "description": "<p>Number of results.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "size": "1-*",
            "optional": true,
            "field": "page",
            "defaultValue": "1",
            "description": "<p>Paginate page.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "allowedValues": [
              "asc",
              "desc"
            ],
            "optional": true,
            "field": "direction",
            "defaultValue": "asc",
            "description": "<p>Sort direction.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "allowedValues": [
              "id",
              "feedback_title",
              "feedback_date",
              "feedback_type_id",
              "user_id"
            ],
            "optional": true,
            "field": "sort",
            "defaultValue": "id",
            "description": "<p>Sort by field.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "feedbacks",
            "description": "<p>List of feedbacks (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "feedbacks.id",
            "description": "<p>Feedback ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "feedbacks.feedback_title",
            "description": "<p>Feedback title.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "feedbacks.feedback_comment",
            "description": "<p>Feedback comment.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "feedbacks.feedback_date",
            "description": "<p>Created date.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "feedbacks.feedback_result",
            "description": "<p>Feedback result.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "feedbacks.feedback_type_id",
            "description": "<p>Feedback type ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "feedbacks.user_id",
            "description": "<p>User ID.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n {\n     \"feedbacks\": [\n          {\n              \"id\": 1,\n              \"feedback_title\": \"About the menu bar\",\n              \"feedback_comment\": \"The top menu bar is not show in Post Page.\",\n              \"feedback_date\": \"2016-03-02T00:00:00+0000\",\n              \"feedback_result\": \"Thank you. We'll fix it soon.\",\n              \"feedback_type_id\": 1,\n              \"user_id\": 1\n          }\n     ]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "career_system/src/Controller/Api/FeedbacksController.php",
    "groupTitle": "Feedback"
  },
  {
    "type": "POST",
    "url": "/feedbacks",
    "title": "3. Create a new Feedback",
    "name": "PostFeedback",
    "group": "Feedback",
    "version": "0.2.0",
    "permission": [
      {
        "name": "none"
      }
    ],
    "description": "<p>Create a new Feedback. This is a descripton.</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "feedback_title",
            "description": "<p>Feedback title.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "feedback_comment",
            "description": "<p>Feedback comment.</p>"
          },
          {
            "group": "Parameter",
            "type": "Date",
            "optional": false,
            "field": "feedback_date",
            "description": "<p>Created date.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "feedback_result",
            "description": "<p>Feedback result.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "feedback_type_id",
            "description": "<p>Feedback type ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "user_id",
            "description": "<p>User ID.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>POST message (Values: <code>Saved</code>,<code>Error</code>).</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "feedback",
            "description": "<p>Feedback Objects.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "feedback.id",
            "description": "<p>Feedback ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "feedback.feedback_title",
            "description": "<p>Feedback title.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "feedback.feedback_comment",
            "description": "<p>Feedback comment.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "feedback.feedback_date",
            "description": "<p>Created date.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "feedback.feedback_result",
            "description": "<p>Feedback result.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "feedback.feedback_type_id",
            "description": "<p>Feedback type ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "feedback.user_id",
            "description": "<p>User ID.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n    \"message\": \"Saved\",\n    \"feedback\": {\n        \"id\": 2\n        \"feedback_title\": \"About the menu bar\",\n        \"feedback_comment\": \"The top menu bar is not show in Post Page.\",\n        \"feedback_date\": \"2016-03-02T00:00:00+0000\",\n        \"feedback_result\": null,\n        \"feedback_type_id\": 1,\n        \"user_id\": 1\n    }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "career_system/src/Controller/Api/FeedbacksController.php",
    "groupTitle": "Feedback"
  },
  {
    "type": "GET",
    "url": "/posts/:id",
    "title": "2. Request Post information",
    "name": "GetPost",
    "group": "Post",
    "version": "0.2.0",
    "permission": [
      {
        "name": "none"
      }
    ],
    "description": "<p>Request Post information. This is a descripton.</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Post ID.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "post",
            "description": "<p>Post object.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "post.id",
            "description": "<p>Post ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "post.post_title",
            "description": "<p>Post title.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "post.post_content",
            "description": "<p>Post content.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "post.post_salary",
            "description": "<p>Job's salary.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "post.post_location",
            "description": "<p>Job's location.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "post.post_date",
            "description": "<p>Created date.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "post.post_status",
            "description": "<p>Post status.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "post.category_id",
            "description": "<p>Category ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "post.hiring_manager_id",
            "description": "<p>Hiring manager ID.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n {\n     \"post\": {\n         \"id\": 1,\n         \"post_title\": \"SUMMER INTERN\",\n         \"post_content\": \"If full is true, the full base URL will be prepended to the result\",\n         \"post_salary\": 5000000,\n         \"post_location\": \"Danang, Vietnam\",\n         \"post_date\": \"2016-03-25T00:00:00+0000\",\n         \"post_status\": true,\n         \"category_id\": 1,\n         \"hiring_manager_id\": 1,\n     }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "career_system/src/Controller/Api/PostsController.php",
    "groupTitle": "Post",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "PostNotFound",
            "description": "<p>The <code>id</code> of the Post was not found.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 Not Found\n {\n     message: \"Record not found in table \"posts\"\",\n     url: \"/CareerSystemWebBased/career_system/api/posts/0\",\n     code: 404\n }",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "GET",
    "url": "/posts",
    "title": "1. Request All Posts information",
    "name": "GetPosts",
    "group": "Post",
    "version": "0.2.0",
    "permission": [
      {
        "name": "none"
      }
    ],
    "description": "<p>Request All Posts information. This is a descripton.</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "category_id",
            "description": "<p>Category ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "hiring_manager_id",
            "description": "<p>Hiring Manager ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "size": "1-*",
            "optional": true,
            "field": "limit",
            "defaultValue": "20",
            "description": "<p>Number of results.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "size": "1-*",
            "optional": true,
            "field": "page",
            "defaultValue": "1",
            "description": "<p>Paginate page.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "allowedValues": [
              "asc",
              "desc"
            ],
            "optional": true,
            "field": "direction",
            "defaultValue": "asc",
            "description": "<p>Sort direction.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "allowedValues": [
              "id",
              "post_title",
              "post_salary",
              "post_location",
              "post_date",
              "category_id",
              "hiring_manager_id"
            ],
            "optional": true,
            "field": "sort",
            "defaultValue": "id",
            "description": "<p>Sort by field.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "posts",
            "description": "<p>List of posts (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "posts.id",
            "description": "<p>Post ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "posts.post_title",
            "description": "<p>Post title.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "posts.post_content",
            "description": "<p>Post content.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "posts.post_salary",
            "description": "<p>Job's salary.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "posts.post_location",
            "description": "<p>Job's location.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "posts.post_date",
            "description": "<p>Created date.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "posts.post_status",
            "description": "<p>Post status.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "posts.category_id",
            "description": "<p>Category ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "posts.hiring_manager_id",
            "description": "<p>Hiring manager ID.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n {\n     \"posts\": [\n          {\n              \"id\": 1,\n              \"post_title\": \"SUMMER INTERN\",\n              \"post_content\": \"If full is true, the full base URL will be prepended to the result\",\n              \"post_salary\": 5000000,\n              \"post_location\": \"Danang, Vietnam\",\n              \"post_date\": \"2016-03-25T00:00:00+0000\",\n              \"post_status\": true,\n              \"category_id\": 1,\n              \"hiring_manager_id\": 1,\n          }\n     ]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "career_system/src/Controller/Api/PostsController.php",
    "groupTitle": "Post"
  },
  {
    "type": "POST",
    "url": "/posts",
    "title": "3. Create a new Post",
    "name": "PostPost",
    "group": "Post",
    "version": "0.2.0",
    "permission": [
      {
        "name": "Hiring Manager"
      }
    ],
    "description": "<p>Create a new Post. This is a descripton.</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "post_title",
            "description": "<p>Post title.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "post_content",
            "description": "<p>Post content.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "post_salary",
            "description": "<p>Job's salary.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "post_location",
            "description": "<p>Job's location.</p>"
          },
          {
            "group": "Parameter",
            "type": "Date",
            "optional": false,
            "field": "post_date",
            "description": "<p>Created date.</p>"
          },
          {
            "group": "Parameter",
            "type": "Boolean",
            "optional": false,
            "field": "post_status",
            "description": "<p>Post status.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "category_id",
            "description": "<p>Category ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "hiring_manager_id",
            "description": "<p>Hiring manager ID.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>POST message (Values: <code>Saved</code>,<code>Error</code>).</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "post",
            "description": "<p>Post object.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "post.id",
            "description": "<p>Post ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "post.post_title",
            "description": "<p>Post title.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "post.post_content",
            "description": "<p>Post content.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "post.post_salary",
            "description": "<p>Job's salary.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "post.post_location",
            "description": "<p>Job's location.</p>"
          },
          {
            "group": "Success 200",
            "type": "Date",
            "optional": false,
            "field": "post.post_date",
            "description": "<p>Created date.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "post.post_status",
            "description": "<p>Post status.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "post.category_id",
            "description": "<p>Category ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "post.hiring_manager_id",
            "description": "<p>Hiring manager ID.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n    \"message\": \"Saved\",\n    \"post\": {\n        \"id\": 2\n        \"post_title\": \"SUMMER INTERN\",\n        \"post_content\": \"If full is true, the full base URL will be prepended to the result\",\n        \"post_salary\": 5000000,\n        \"post_location\": \"Danang, Vietnam\",\n        \"post_date\": \"2016-03-22T00:00:00+0000\",\n        \"post_status\": true,\n        \"category_id\": 1,\n        \"hiring_manager_id\": 1,\n    }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "career_system/src/Controller/Api/PostsController.php",
    "groupTitle": "Post"
  },
  {
    "type": "PUT",
    "url": "/posts/:id",
    "title": "4. Modify Post information",
    "name": "PutPost",
    "group": "Post",
    "version": "0.2.0",
    "permission": [
      {
        "name": "Hiring Manager"
      }
    ],
    "description": "<p>Modify Post information. This is a descripton.</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "id",
            "description": "<p>Post ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "post_title",
            "description": "<p>Post title.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "post_content",
            "description": "<p>Post content.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "post_salary",
            "description": "<p>Job's salary.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": true,
            "field": "post_location",
            "description": "<p>Job's location.</p>"
          },
          {
            "group": "Parameter",
            "type": "Boolean",
            "optional": true,
            "field": "post_status",
            "description": "<p>Post status.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "category_id",
            "description": "<p>Category ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "hiring_manager_id",
            "description": "<p>Hiring manager ID.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "message",
            "description": "<p>PUT message (Values: <code>Saved</code>,<code>Error</code>).</p>"
          },
          {
            "group": "Success 200",
            "type": "Object",
            "optional": false,
            "field": "post",
            "description": "<p>Post object.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "post.id",
            "description": "<p>Post ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "post.post_title",
            "description": "<p>Post title.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "post.post_content",
            "description": "<p>Post content.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "post.post_salary",
            "description": "<p>Job's salary.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "post.post_location",
            "description": "<p>Job's location.</p>"
          },
          {
            "group": "Success 200",
            "type": "Boolean",
            "optional": false,
            "field": "post.post_status",
            "description": "<p>Post status.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "post.category_id",
            "description": "<p>Category ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "post.hiring_manager_id",
            "description": "<p>Hiring manager ID.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n    \"message\": \"Saved\",\n    \"post\": {\n        \"id\": 1,\n        \"post_title\": \"SUMMER INTERN\",\n        \"post_content\": \"If full is true, the full base URL will be prepended to the result\",\n        \"post_salary\": 5000000,\n        \"post_location\": \"Danang, Vietnam\",\n        \"post_status\": true,\n        \"category_id\": 1,\n        \"hiring_manager_id\": 1,\n    }\n}",
          "type": "json"
        }
      ]
    },
    "filename": "career_system/src/Controller/Api/PostsController.php",
    "groupTitle": "Post",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "PostNotFound",
            "description": "<p>The <code>id</code> of the Post was not found.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 Not Found\n {\n     message: \"Record not found in table \"posts\"\",\n     url: \"/CareerSystemWebBased/career_system/api/posts/0\",\n     code: 404\n }",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "GET",
    "url": "/skills",
    "title": "1. Request All Skills information",
    "name": "GetSkills",
    "group": "Skill",
    "version": "0.2.0",
    "permission": [
      {
        "name": "none"
      }
    ],
    "description": "<p>Request All Skills information. This is a descripton.</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": true,
            "field": "skill_type_id",
            "description": "<p>Skill Type ID.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "size": "1-*",
            "optional": true,
            "field": "limit",
            "defaultValue": "20",
            "description": "<p>Number of results.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "size": "1-*",
            "optional": true,
            "field": "page",
            "defaultValue": "1",
            "description": "<p>Paginate page.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "allowedValues": [
              "asc",
              "desc"
            ],
            "optional": true,
            "field": "direction",
            "defaultValue": "asc",
            "description": "<p>Sort direction.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "allowedValues": [
              "id",
              "skill_name",
              "skill_type_id"
            ],
            "optional": true,
            "field": "sort",
            "defaultValue": "id",
            "description": "<p>Sort by field.</p>"
          }
        ]
      }
    },
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "skills",
            "description": "<p>List of skills (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "skills.id",
            "description": "<p>Skill ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "skills.skill_name",
            "description": "<p>Skill name.</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "skills.skill_type_id",
            "description": "<p>Skill type ID.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n {\n     \"skills\": [\n          {\n              \"id\": 1,\n              \"skill_name\": \"CakePHP\",\n              \"skill_type_id\": 1,\n          }\n     ]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "career_system/src/Controller/Api/SkillsController.php",
    "groupTitle": "Skill"
  },
  {
    "type": "GET",
    "url": "/skill_types",
    "title": "1. Request All Skill Types information",
    "name": "GetSkillTypes",
    "group": "Skill_Type",
    "version": "0.2.0",
    "permission": [
      {
        "name": "none"
      }
    ],
    "description": "<p>Request All Skill Types information. This is a descripton.</p>",
    "success": {
      "fields": {
        "Success 200": [
          {
            "group": "Success 200",
            "type": "Object[]",
            "optional": false,
            "field": "skillTypes",
            "description": "<p>List of Skill Types (Array of Objects).</p>"
          },
          {
            "group": "Success 200",
            "type": "Number",
            "optional": false,
            "field": "skillTypes.id",
            "description": "<p>Skill Type ID.</p>"
          },
          {
            "group": "Success 200",
            "type": "String",
            "optional": false,
            "field": "skillTypes.skill_type_name",
            "description": "<p>Skill Type name.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Success-Response:",
          "content": " HTTP/1.1 200 OK\n {\n     \"skillTypes\": [\n          {\n              \"id\": 1,\n              \"skill_type_name\": \"Websites, IT & Software\"\n          }\n     ]\n}",
          "type": "json"
        }
      ]
    },
    "filename": "career_system/src/Controller/Api/SkillTypesController.php",
    "groupTitle": "Skill_Type",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "size": "1-*",
            "optional": true,
            "field": "limit",
            "defaultValue": "20",
            "description": "<p>Number of results.</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "size": "1-*",
            "optional": true,
            "field": "page",
            "defaultValue": "1",
            "description": "<p>Paginate page.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "allowedValues": [
              "asc",
              "desc"
            ],
            "optional": true,
            "field": "direction",
            "defaultValue": "asc",
            "description": "<p>Sort direction.</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "allowedValues": [
              "id",
              "skill_type_name"
            ],
            "optional": true,
            "field": "sort",
            "defaultValue": "id",
            "description": "<p>Sort by field.</p>"
          }
        ]
      }
    }
  }
] });
