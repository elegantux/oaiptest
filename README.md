# BuildShip Proxy

## ChatGPT Proxy

<details><summary>Rest API Call</summary>
<p>

```
Path: /
Method: POST
```

</p>
</details>

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
    "id": "6aaace19-3850-48f9-9c6a-b0fad4e5794f",
    "script": "import fetch from \"node-fetch\";\nexport default async function apiCall({\n    url,\n    method,\n    contentType,\n    authorization,\n    body,\n    shouldAwait,\n    queryParams\n}, {\n    logging\n}) {\n    const headers = {\n        \"Content-Type\": contentType\n    };\n    if (authorization) headers[\"Authorization\"] = authorization;\n\n    let queryParamsString = '';\n    if (queryParams) {\n        queryParamsString = '?' + new URLSearchParams(queryParams).toString();\n    }\n\n    const fetchPromise = fetch(url + queryParamsString, {\n        method,\n        headers,\n        body: JSON.stringify(body),\n    });\n\n    if (!shouldAwait) {\n        return {\n            data: null\n        };\n    }\n\n    const response = await fetchPromise;\n    const data = await response.json();\n\n    logging.log('OpenAI Response:', data.error);\n\n    if (data.error) {\n      throw new Error(data.error.message);\n    }\n\n    return {\n        status: response.status,\n        data\n    };\n}",
    "meta": {
      "description": "Make an API call using fetch with provided url, method, contentType, authorization, and body",
      "icon": {
        "type": "SVG",
        "svg": "<path d=\"m14 12l-2 2l-2-2l2-2l2 2zm-2-6l2.12 2.12l2.5-2.5L12 1L7.38 5.62l2.5 2.5L12 6zm-6 6l2.12-2.12l-2.5-2.5L1 12l4.62 4.62l2.5-2.5L6 12zm12 0l-2.12 2.12l2.5 2.5L23 12l-4.62-4.62l-2.5 2.5L18 12zm-6 6l-2.12-2.12l-2.5 2.5L12 23l4.62-4.62l-2.5-2.5L12 18z\"></path>"
      },
      "name": "API Call",
      "id": "api-call"
    },
    "output": {
      "type": "object",
      "buildship": {},
      "properties": {
        "status": {
          "type": "number",
          "description": "The HTTP status of the API response",
          "title": "Status",
          "buildship": {}
        },
        "data": {
          "description": "The data object from the API response",
          "buildship": {},
          "type": "object",
          "title": "Data"
        }
      }
    },
    "version": "1.0.2",
    "inputs": {
      "required": [
        "url",
        "shouldAwait",
        "method"
      ],
      "type": "object",
      "properties": {
        "url": {
          "buildship": {
            "index": 1
          },
          "title": "URL",
          "description": "The URL of the API endpoint",
          "type": "string"
        },
        "contentType": {
          "description": "The content type of the API call",
          "buildship": {
            "sensitive": false,
            "index": 4,
            "options": [
              {
                "label": "application/json",
                "value": "application/json"
              },
              {
                "value": "application/x-www-form-urlencoded",
                "label": "application/x-www-form-urlencoded"
              },
              {
                "label": "multipart/form-data",
                "value": "multipart/form-data"
              },
              {
                "label": "text/plain",
                "value": "text/plain"
              }
            ]
          },
          "default": "",
          "pattern": "",
          "enum": [
            "application/json",
            "application/x-www-form-urlencoded",
            "multipart/form-data",
            "text/plain"
          ],
          "type": "string",
          "title": "Content Type"
        },
        "body": {
          "type": "object",
          "description": "The body to send with the API call",
          "buildship": {
            "index": 3
          },
          "title": "Body"
        },
        "method": {
          "default": "",
          "type": "string",
          "title": "HTTP Method",
          "enum": [
            "GET",
            "POST",
            "PUT",
            "DELETE",
            "PATCH"
          ],
          "pattern": "",
          "buildship": {
            "sensitive": false,
            "index": 0,
            "options": [
              {
                "label": "GET",
                "value": "GET"
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
                "value": "DELETE",
                "label": "DELETE"
              },
              {
                "label": "PATCH",
                "value": "PATCH"
              }
            ]
          },
          "description": "The HTTP method to use for the API call"
        },
        "shouldAwait": {
          "buildship": {
            "sensitive": false,
            "index": 5
          },
          "type": "boolean",
          "pattern": "",
          "description": "Whether to wait for the request to complete or not",
          "title": "Await?"
        },
        "authorization": {
          "title": "Authorization",
          "description": "The authorization header for the API call, if required (e.g., Bearer or Basic token)",
          "pattern": "",
          "buildship": {
            "sensitive": false,
            "index": 2
          },
          "type": "string"
        }
      }
    },
    "type": "script",
    "integrity": "aa3c32f14ef397fda79ac3fbb7feb1bd7f10108978ab4d2a7e7ad44d195164ec",
    "src": "https://storage.googleapis.com/buildship-app-us-central1/builtNodes/api-call/1.0.2.cjs",
    "description": "Make an API call using fetch with provided url, method, contentType, authorization, and body",
    "name": "API Call",
    "onFail": null,
    "label": "API Call",
    "dependencies": {
      "node-fetch": "3.3.2"
    },
    "values": {
      "queryParams": {},
      "authorization": {
        "expression": "ctx[\"root\"][\"request\"][\"headers\"].authorization"
      },
      "url": {
        "keys": [
          "2cae3437-048b-4172-b4f2-0262f89bfc95"
        ]
      },
      "shouldAwait": true,
      "body": {
        "keys": [
          "request",
          "body"
        ]
      },
      "contentType": {
        "expression": "ctx[\"root\"][\"request\"][\"headers\"]['content-type']",
        "type": "javascript"
      },
      "method": {
        "expression": "ctx[\"root\"][\"request\"].method",
        "type": "javascript"
      }
    }
  }
]
```

</p>
</details>

<details><summary>Return</summary>
<p>

```
Status code: OK(200)
Value: API Call > Data
```

</p>
</details>

## Pixabay Proxy

<details><summary>Rest API CAll</summary>
<p>

```
Path: /
Method: GET
```

</p>
</details>

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

<details><summary>Return</summary>
<p>

```
Status code: OK(200)
Value: API Call > Data
```

</p>
</details>