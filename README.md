# BuildShip Proxy

## ChatGPT Proxy

<details><summary>Empty node</summary>
<p>

```JSON
[
  {
    "inputs": {
      "required": [],
      "type": "object",
      "properties": {
        "request": {
          "default": "",
          "type": "string",
          "title": "Request",
          "description": "",
          "buildship": {
            "sensitive": false,
            "index": 0
          },
          "pattern": ""
        }
      }
    },
    "type": "script",
    "id": "3cc18f4f-c3f0-4360-bd11-279bb92fbf17",
    "meta": {
      "name": "Blank Script",
      "id": "65983247-73f1-486b-9aca-08a5406f1cdd",
      "description": "This is blank script node to help you get started. [Full Documentation](https://docs.buildship.com/core-nodes/script)."
    },
    "description": "This is blank script node to help you get started.",
    "output": {
      "type": "string",
      "description": "",
      "buildship": {},
      "title": "url"
    },
    "script": "export default async ({request},{logging}) => {\n  return request.headers.endpoint;\n}",
    "label": "Empty node",
    "values": {
      "request": {
        "keys": [
          "request"
        ]
      },
      "name": {
        "keys": [
          "request"
        ]
      }
    }
  }
]
```

</p>
</details>

<details><summary>API Call</summary>
<p>

```JSON
[
  {
    "id": "5fd0beef-8d06-437f-aefb-91c86780ba84",
    "dependencies": {
      "node-fetch": "3.3.2"
    },
    "description": "Make an API call using fetch with provided url, method, contentType, authorization, and body",
    "version": "1.0.2",
    "src": "https://storage.googleapis.com/buildship-app-us-central1/builtNodes/api-call/1.0.2.cjs",
    "integrity": "aa3c32f14ef397fda79ac3fbb7feb1bd7f10108978ab4d2a7e7ad44d195164ec",
    "script": "import fetch from \"node-fetch\";\nexport default async function apiCall({\n    url,\n    method,\n    contentType,\n    authorization,\n    body,\n    shouldAwait,\n    queryParams\n}, {\n    logging\n}) {\n    const headers = {\n        \"Content-Type\": contentType\n    };\n    if (authorization) headers[\"Authorization\"] = authorization;\n\n    let queryParamsString = '';\n    if (queryParams) {\n        queryParamsString = '?' + new URLSearchParams(queryParams).toString();\n    }\n\n    const fetchPromise = fetch(url + queryParamsString, {\n        method,\n        headers,\n        body: JSON.stringify(body),\n    });\n\n    if (!shouldAwait) {\n        return {\n            data: null\n        };\n    }\n\n    const response = await fetchPromise;\n    const data = await response.json();\n    return {\n        status: response.status,\n        data\n    };\n}",
    "output": {
      "buildship": {},
      "properties": {
        "data": {
          "description": "The data object from the API response",
          "buildship": {},
          "title": "Data",
          "type": "object"
        },
        "status": {
          "description": "The HTTP status of the API response",
          "buildship": {},
          "type": "number",
          "title": "Status"
        }
      },
      "type": "object"
    },
    "inputs": {
      "properties": {
        "body": {
          "buildship": {
            "index": 3
          },
          "description": "The body to send with the API call",
          "type": "object",
          "title": "Body"
        },
        "method": {
          "default": "",
          "pattern": "",
          "buildship": {
            "sensitive": false,
            "options": [
              {
                "value": "GET",
                "label": "GET"
              },
              {
                "value": "POST",
                "label": "POST"
              },
              {
                "value": "PUT",
                "label": "PUT"
              },
              {
                "label": "DELETE",
                "value": "DELETE"
              },
              {
                "label": "PATCH",
                "value": "PATCH"
              }
            ],
            "index": 0
          },
          "description": "The HTTP method to use for the API call",
          "type": "string",
          "enum": [
            "GET",
            "POST",
            "PUT",
            "DELETE",
            "PATCH"
          ],
          "title": "HTTP Method"
        },
        "contentType": {
          "type": "string",
          "title": "Content Type",
          "description": "The content type of the API call",
          "default": "",
          "buildship": {
            "sensitive": false,
            "index": 4,
            "options": [
              {
                "value": "application/json",
                "label": "application/json"
              },
              {
                "label": "application/x-www-form-urlencoded",
                "value": "application/x-www-form-urlencoded"
              },
              {
                "value": "multipart/form-data",
                "label": "multipart/form-data"
              },
              {
                "value": "text/plain",
                "label": "text/plain"
              }
            ]
          },
          "pattern": "",
          "enum": [
            "application/json",
            "application/x-www-form-urlencoded",
            "multipart/form-data",
            "text/plain"
          ]
        },
        "url": {
          "description": "The URL of the API endpoint",
          "type": "string",
          "buildship": {
            "index": 1
          },
          "title": "URL"
        },
        "authorization": {
          "type": "string",
          "description": "The authorization header for the API call, if required (e.g., Bearer or Basic token)",
          "pattern": "",
          "buildship": {
            "index": 2,
            "sensitive": false
          },
          "title": "Authorization"
        },
        "shouldAwait": {
          "description": "Whether to wait for the request to complete or not",
          "buildship": {
            "sensitive": false,
            "index": 5
          },
          "type": "boolean",
          "title": "Await?",
          "pattern": ""
        }
      },
      "required": [
        "url",
        "shouldAwait",
        "method"
      ],
      "type": "object"
    },
    "type": "script",
    "onFail": null,
    "meta": {
      "icon": {
        "svg": "<path d=\"m14 12l-2 2l-2-2l2-2l2 2zm-2-6l2.12 2.12l2.5-2.5L12 1L7.38 5.62l2.5 2.5L12 6zm-6 6l2.12-2.12l-2.5-2.5L1 12l4.62 4.62l2.5-2.5L6 12zm12 0l-2.12 2.12l2.5 2.5L23 12l-4.62-4.62l-2.5 2.5L18 12zm-6 6l-2.12-2.12l-2.5 2.5L12 23l4.62-4.62l-2.5-2.5L12 18z\"></path>",
        "type": "SVG"
      },
      "id": "api-call",
      "description": "Make an API call using fetch with provided url, method, contentType, authorization, and body",
      "name": "API Call"
    },
    "label": "API Call",
    "values": {
      "method": {
        "type": "javascript",
        "expression": "ctx[\"root\"][\"request\"].method"
      },
      "body": {
        "keys": [
          "request",
          "body"
        ]
      },
      "shouldAwait": true,
      "queryParams": {},
      "authorization": {
        "expression": "ctx[\"root\"][\"request\"][\"headers\"].authorization"
      },
      "contentType": {
        "expression": "ctx[\"root\"][\"request\"][\"headers\"]['content-type']",
        "type": "javascript"
      },
      "url": {
        "keys": [
          "3cc18f4f-c3f0-4360-bd11-279bb92fbf17"
        ]
      }
    }
  }
]
```

</p>
</details>

## Pixabay Proxy

<details><summary>Empty node</summary>
<p>

```JSON
[
  {
    "inputs": {
      "required": [],
      "type": "object",
      "properties": {
        "request": {
          "type": "string",
          "pattern": "",
          "title": "Request",
          "description": "",
          "default": "",
          "buildship": {
            "sensitive": false,
            "index": 0
          }
        }
      }
    },
    "output": {
      "title": "url",
      "type": "string",
      "buildship": {},
      "description": ""
    },
    "label": "Empty node",
    "type": "script",
    "description": "This is blank script node to help you get started.",
    "meta": {
      "id": "65983247-73f1-486b-9aca-08a5406f1cdd",
      "description": "This is blank script node to help you get started. [Full Documentation](https://docs.buildship.com/core-nodes/script).",
      "name": "Blank Script"
    },
    "id": "66ac0695-04fe-4153-bfe8-fadbcfd376c6",
    "onFail": null,
    "script": "export default async ({request},{logging}) => {\n  logging.log(`Empty node: ${request.headers.endpoint}`);\n  return request.headers.endpoint;\n}",
    "name": "Blank Script",
    "values": {
      "name": {
        "keys": [
          "request"
        ]
      },
      "request": {
        "keys": [
          "request"
        ]
      }
    }
  }
]
```

</p>
</details>

<details><summary>API Call</summary>
<p>

```JSON
[
  {
    "meta": {
      "id": "api-call",
      "icon": {
        "type": "SVG",
        "svg": "<path d=\"m14 12l-2 2l-2-2l2-2l2 2zm-2-6l2.12 2.12l2.5-2.5L12 1L7.38 5.62l2.5 2.5L12 6zm-6 6l2.12-2.12l-2.5-2.5L1 12l4.62 4.62l2.5-2.5L6 12zm12 0l-2.12 2.12l2.5 2.5L23 12l-4.62-4.62l-2.5 2.5L18 12zm-6 6l-2.12-2.12l-2.5 2.5L12 23l4.62-4.62l-2.5-2.5L12 18z\"></path>"
      },
      "description": "Make an API call using fetch with provided url, method, contentType, authorization, and body",
      "name": "API Call"
    },
    "integrity": "aa3c32f14ef397fda79ac3fbb7feb1bd7f10108978ab4d2a7e7ad44d195164ec",
    "inputs": {
      "type": "object",
      "properties": {
        "authorization": {
          "default": "",
          "title": "Authorization",
          "type": "string",
          "buildship": {
            "index": 1,
            "sensitive": false
          },
          "pattern": "",
          "description": "The authorization header for the API call, if required (e.g., Bearer or Basic token)"
        },
        "method": {
          "default": "",
          "buildship": {
            "sensitive": false,
            "index": 0,
            "options": [
              {
                "label": "GET",
                "value": "GET"
              },
              {
                "label": "POST",
                "value": "POST"
              },
              {
                "value": "PUT",
                "label": "PUT"
              },
              {
                "value": "DELETE",
                "label": "DELETE"
              },
              {
                "label": "PATCH",
                "value": "PATCH"
              }
            ]
          },
          "pattern": "",
          "title": "HTTP Method",
          "description": "The HTTP method to use for the API call",
          "type": "string",
          "enum": [
            "GET",
            "POST",
            "PUT",
            "DELETE",
            "PATCH"
          ]
        },
        "queryParams": {
          "default": "",
          "description": "The URL of the API endpoint",
          "type": "string",
          "title": "Query Params",
          "buildship": {
            "index": 3,
            "sensitive": false
          },
          "pattern": ""
        },
        "url": {
          "description": "",
          "pattern": "",
          "buildship": {
            "sensitive": false,
            "index": 5
          },
          "title": "URL",
          "default": "",
          "type": "string"
        },
        "contentType": {
          "description": "The content type of the API call",
          "title": "Content Type",
          "pattern": "",
          "enum": [
            "application/json",
            "application/x-www-form-urlencoded",
            "multipart/form-data",
            "text/plain"
          ],
          "buildship": {
            "options": [
              {
                "value": "application/json",
                "label": "application/json"
              },
              {
                "value": "application/x-www-form-urlencoded",
                "label": "application/x-www-form-urlencoded"
              },
              {
                "value": "multipart/form-data",
                "label": "multipart/form-data"
              },
              {
                "value": "text/plain",
                "label": "text/plain"
              }
            ],
            "index": 2,
            "sensitive": false
          },
          "type": "string",
          "default": ""
        },
        "shouldAwait": {
          "buildship": {
            "sensitive": false,
            "index": 5
          },
          "description": "Whether to wait for the request to complete or not",
          "type": "boolean",
          "pattern": "",
          "title": "Await?"
        }
      },
      "required": [
        "shouldAwait",
        "method",
        "queryParams"
      ]
    },
    "output": {
      "type": "object",
      "properties": {
        "status": {
          "description": "The HTTP status of the API response",
          "title": "Status",
          "type": "number",
          "buildship": {}
        },
        "data": {
          "title": "Data",
          "buildship": {},
          "type": "object",
          "description": "The data object from the API response"
        }
      },
      "buildship": {}
    },
    "script": "import fetch from \"node-fetch\";\nexport default async function apiCall({\n    url,\n    method,\n    contentType,\n    authorization,\n    body,\n    shouldAwait,\n    queryParams\n}, {\n    logging\n}) {\n    const headers = {\n        \"Content-Type\": contentType\n    };\n    if (authorization) headers[\"Authorization\"] = authorization;\n\n    let queryParamsString = '';\n    if (queryParams) {\n        queryParamsString = '?' + new URLSearchParams(queryParams).toString();\n    }\n\n    const fetchPromise = fetch(url + queryParamsString, {\n        method,\n        headers,\n    });\n\n    if (!shouldAwait) {\n        return {\n            data: null\n        };\n    }\n\n    try {\n      const response = await fetchPromise;\n      const data = await response.json();\n\n      return {\n        status: response.status,\n        data\n      };\n    } catch (error) {\n      logging.log(`API Call Error`, error);\n      throw error;\n    }\n}",
    "onFail": null,
    "src": "https://storage.googleapis.com/buildship-app-us-central1/builtNodes/api-call/1.0.2.cjs",
    "name": "API Call",
    "version": "1.0.2",
    "dependencies": {
      "node-fetch": "3.3.2"
    },
    "type": "script",
    "label": "API Call",
    "id": "4b49dc41-f746-4f7b-92f2-e49bb51ca51d",
    "description": "Make an API call using fetch with provided url, method, contentType, authorization, and body",
    "values": {
      "method": {
        "expression": "ctx[\"root\"][\"request\"].method",
        "type": "javascript"
      },
      "shouldAwait": true,
      "contentType": {
        "expression": "ctx[\"root\"][\"request\"][\"headers\"]['content-type']",
        "type": "javascript"
      },
      "query": {
        "keys": [
          "request",
          "query"
        ]
      },
      "authorization": {
        "expression": "ctx[\"root\"][\"request\"][\"headers\"].authorization"
      },
      "queryParams": {
        "keys": [
          "request",
          "query"
        ]
      },
      "body": {
        "keys": [
          "request",
          "body"
        ]
      },
      "url": {
        "keys": [
          "66ac0695-04fe-4153-bfe8-fadbcfd376c6"
        ]
      }
    }
  }
]
```

</p>
</details>