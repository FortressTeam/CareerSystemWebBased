define({ "api": [
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
              "id",
              "skill_name",
              "skill_type_id"
            ],
            "optional": true,
            "field": "sort",
            "defaultValue": "id",
            "description": "<p>Sort by field.</p>"
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
          "content": "HTTP/1.1 404 Not Found\n {\n     message: \"Record not found in table \"posts\"\",\n     url: \"/CareerSystemWebBased/career_system/api/posts/0.json\",\n     code: 404\n }",
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
              "id",
              "skill_name",
              "skill_type_id"
            ],
            "optional": true,
            "field": "sort",
            "defaultValue": "id",
            "description": "<p>Sort by field.</p>"
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
          "content": "HTTP/1.1 404 Not Found\n {\n     message: \"Record not found in table \"posts\"\",\n     url: \"/CareerSystemWebBased/career_system/api/posts/0.json\",\n     code: 404\n }",
          "type": "json"
        }
      ]
    }
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
        "name": "none"
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
          "content": "HTTP/1.1 200 OK\n{\n    \"message\": \"Saved\",\n    \"post\": {\n        \"post_title\": \"SUMMER INTERN\",\n        \"post_content\": \"If full is true, the full base URL will be prepended to the result\",\n        \"post_salary\": 5000000,\n        \"post_location\": \"Danang, Vietnam\",\n        \"post_status\": true,\n        \"category_id\": 1,\n        \"hiring_manager_id\": 1,\n    }\n}",
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
        "name": "none"
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
          "content": "HTTP/1.1 404 Not Found\n {\n     message: \"Record not found in table \"posts\"\",\n     url: \"/CareerSystemWebBased/career_system/api/posts/0.json\",\n     code: 404\n }",
          "type": "json"
        }
      ]
    }
  },
  {
    "type": "GET",
    "url": "/skills",
    "title": "1. Request All Skill information",
    "name": "GetSkills",
    "group": "Skill",
    "version": "0.2.0",
    "permission": [
      {
        "name": "none"
      }
    ],
    "description": "<p>Request All Skill information. This is a descripton.</p>",
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
              "id",
              "skill_name",
              "skill_type_id"
            ],
            "optional": true,
            "field": "sort",
            "defaultValue": "id",
            "description": "<p>Sort by field.</p>"
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
    "groupTitle": "Skill",
    "error": {
      "fields": {
        "Error 4xx": [
          {
            "group": "Error 4xx",
            "optional": false,
            "field": "SkillNotFound",
            "description": "<p>The <code>id</code> of the Skill was not found.</p>"
          }
        ]
      },
      "examples": [
        {
          "title": "Error-Response:",
          "content": "HTTP/1.1 404 Not Found\n {\n     message: \"Record not found in table \"skills\"\",\n     url: \"/CareerSystemWebBased/career_system/api/skills/0.json\",\n     code: 404\n }",
          "type": "json"
        }
      ]
    }
  }
] });