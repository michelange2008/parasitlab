<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <link rel="stylesheet" href="{{ asset('/docs/css/style.css') }}" />
    <script src="{{ asset('/docs/js/all.js') }}"></script>


          <script>
        $(function() {
            setupLanguages(["bash","javascript"]);
        });
      </script>
      </head>

  <body class="">
    <a href="#" id="nav-button">
      <span>
        NAV
        <img src="/docs/images/navbar.png" />
      </span>
    </a>
    <div class="tocify-wrapper">
        <img src="/docs/images/logo.png" />
                    <div class="lang-selector">
                                  <a href="#" data-language-name="bash">bash</a>
                                  <a href="#" data-language-name="javascript">javascript</a>
                            </div>
                            <div class="search">
              <input type="text" class="search" id="input-search" placeholder="Search">
            </div>
            <ul class="search-results"></ul>
              <div id="toc">
      </div>
                    <ul class="toc-footer">
                                  <li><a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a></li>
                            </ul>
            </div>
    <div class="page-wrapper">
      <div class="dark-box"></div>
      <div class="content">
          <!-- START_INFO -->
<h1>Info</h1>
<p>Welcome to the generated API reference.
<a href="{{ route("apidoc.json") }}">Get Postman Collection</a></p>
<!-- END_INFO -->
<h1>general</h1>
<!-- START_c6c5c00d6ac7f771f157dff4a2889b1a -->
<h2>_debugbar/open</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/_debugbar/open" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/_debugbar/open"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "message": ""
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET _debugbar/open</code></p>
<!-- END_c6c5c00d6ac7f771f157dff4a2889b1a -->
<!-- START_7b167949c615f4a7e7b673f8d5fdaf59 -->
<h2>Return Clockwork output</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/_debugbar/clockwork/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/_debugbar/clockwork/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "message": ""
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET _debugbar/clockwork/{id}</code></p>
<!-- END_7b167949c615f4a7e7b673f8d5fdaf59 -->
<!-- START_01a252c50bd17b20340dbc5a91cea4b7 -->
<h2>_debugbar/telescope/{id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/_debugbar/telescope/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/_debugbar/telescope/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "message": ""
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET _debugbar/telescope/{id}</code></p>
<!-- END_01a252c50bd17b20340dbc5a91cea4b7 -->
<!-- START_5f8a640000f5db43332951f0d77378c4 -->
<h2>Return the stylesheets for the Debugbar</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/_debugbar/assets/stylesheets" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/_debugbar/assets/stylesheets"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "message": ""
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET _debugbar/assets/stylesheets</code></p>
<!-- END_5f8a640000f5db43332951f0d77378c4 -->
<!-- START_db7a887cf930ce3c638a8708fd1a75ee -->
<h2>Return the javascript for the Debugbar</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/_debugbar/assets/javascript" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/_debugbar/assets/javascript"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (404):</p>
</blockquote>
<pre><code class="language-json">{
    "message": ""
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET _debugbar/assets/javascript</code></p>
<!-- END_db7a887cf930ce3c638a8708fd1a75ee -->
<!-- START_0973671c4f56e7409202dc85c868d442 -->
<h2>Forget a cache key</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/_debugbar/cache/1/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/_debugbar/cache/1/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE _debugbar/cache/{key}/{tags?}</code></p>
<!-- END_0973671c4f56e7409202dc85c868d442 -->
<!-- START_7bb98b04700f3dbd85a9fddbc17fe0ba -->
<h2>translations/view/{groupKey?}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/translations/view/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/translations/view/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET translations/view/{groupKey?}</code></p>
<!-- END_7bb98b04700f3dbd85a9fddbc17fe0ba -->
<!-- START_7ac42e4329e6d86622c56c756f8517cc -->
<h2>translations/{groupKey?}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/translations/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/translations/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET translations/{groupKey?}</code></p>
<!-- END_7ac42e4329e6d86622c56c756f8517cc -->
<!-- START_0168ead45c7cb658b56acdd51f089f62 -->
<h2>translations/add/{groupKey}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/translations/add/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/translations/add/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST translations/add/{groupKey}</code></p>
<!-- END_0168ead45c7cb658b56acdd51f089f62 -->
<!-- START_03a7c19ffea6afece61d01e6ec9f2abe -->
<h2>translations/edit/{groupKey}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/translations/edit/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/translations/edit/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST translations/edit/{groupKey}</code></p>
<!-- END_03a7c19ffea6afece61d01e6ec9f2abe -->
<!-- START_c2402a9994d359c70539d10c36926a3a -->
<h2>translations/groups/add</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/translations/groups/add" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/translations/groups/add"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST translations/groups/add</code></p>
<!-- END_c2402a9994d359c70539d10c36926a3a -->
<!-- START_95267c9265896de0058370e9cc5fab1a -->
<h2>translations/delete/{groupKey}/{translationKey}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/translations/delete/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/translations/delete/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST translations/delete/{groupKey}/{translationKey}</code></p>
<!-- END_95267c9265896de0058370e9cc5fab1a -->
<!-- START_b15a96b2f7f6064670414f215ffc1642 -->
<h2>translations/import</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/translations/import" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/translations/import"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST translations/import</code></p>
<!-- END_b15a96b2f7f6064670414f215ffc1642 -->
<!-- START_e091e06c1076126c1c9fa2323a3eb8fe -->
<h2>translations/find</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/translations/find" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/translations/find"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST translations/find</code></p>
<!-- END_e091e06c1076126c1c9fa2323a3eb8fe -->
<!-- START_d3025c4c1e397d883b218e2d9d3159ac -->
<h2>translations/locales/add</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/translations/locales/add" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/translations/locales/add"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST translations/locales/add</code></p>
<!-- END_d3025c4c1e397d883b218e2d9d3159ac -->
<!-- START_ddf8fd8fa949df46487ae802f8788662 -->
<h2>translations/locales/remove</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/translations/locales/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/translations/locales/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST translations/locales/remove</code></p>
<!-- END_ddf8fd8fa949df46487ae802f8788662 -->
<!-- START_33164cb4a403197cc3fcbb16e7c6c006 -->
<h2>translations/publish/{groupKey}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/translations/publish/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/translations/publish/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST translations/publish/{groupKey}</code></p>
<!-- END_33164cb4a403197cc3fcbb16e7c6c006 -->
<!-- START_61fd9a785995208b76444cc60b3109da -->
<h2>translations/translate-missing</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/translations/translate-missing" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/translations/translate-missing"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST translations/translate-missing</code></p>
<!-- END_61fd9a785995208b76444cc60b3109da -->
<!-- START_cd4a874127cd23508641c63b640ee838 -->
<h2>doc.json</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/doc.json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/doc.json"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "variables": [],
    "info": {
        "name": "Parasit'lab API",
        "_postman_id": "0cf17bef-e8e9-4104-bc8e-36049e1e3e38",
        "description": "",
        "schema": "https:\/\/schema.getpostman.com\/json\/collection\/v2.0.0\/collection.json"
    },
    "item": [
        {
            "name": "general",
            "description": "",
            "item": [
                {
                    "name": "_debugbar\/open",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "_debugbar\/open",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Return Clockwork output",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "_debugbar\/clockwork\/:id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "_debugbar\/telescope\/{id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "_debugbar\/telescope\/:id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Return the stylesheets for the Debugbar",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "_debugbar\/assets\/stylesheets",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Return the javascript for the Debugbar",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "_debugbar\/assets\/javascript",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Forget a cache key",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "_debugbar\/cache\/:key\/:tags",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "translations\/view\/{groupKey?}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "translations\/view\/:groupKey",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "translations\/{groupKey?}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "translations\/:groupKey",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "translations\/add\/{groupKey}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "translations\/add\/:groupKey",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "translations\/edit\/{groupKey}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "translations\/edit\/:groupKey",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "translations\/groups\/add",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "translations\/groups\/add",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "translations\/delete\/{groupKey}\/{translationKey}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "translations\/delete\/:groupKey\/:translationKey",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "translations\/import",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "translations\/import",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "translations\/find",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "translations\/find",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "translations\/locales\/add",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "translations\/locales\/add",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "translations\/locales\/remove",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "translations\/locales\/remove",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "translations\/publish\/{groupKey}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "translations\/publish\/:groupKey",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "translations\/translate-missing",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "translations\/translate-missing",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "doc.json",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "doc.json",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/especes",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "api\/especes",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/ages\/{espece_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "api\/ages\/:espece_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/troupeau\/{eleveur_id}\/{espece_nom}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "api\/troupeau\/:eleveur_id\/:espece_nom",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/animal\/{troupeau_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "api\/animal\/:troupeau_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/observations\/especes\/{espece_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "api\/observations\/especes\/:espece_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/observations\/ages\/{age_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "api\/observations\/ages\/:age_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/options",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "api\/options",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/anaactes\/{anatype_id}\/{espece}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "api\/anaactes\/:anatype_id\/:espece",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/anatypes\/{espece}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "api\/anatypes\/:espece",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "REQUETE AJAX DE CreateDemande.js **************************\nMETHODES POUR AIDER A LA SAISIE D'UNE NOUVELLE DEMANDE ET VERIFIANT SI CETTE DEMANDE RENVOIE A UNE serie\nVOIRE UNE SERIE DEJA EXISTANTE\nMéthode qui renvoie un json (liste) qui comprend:\n - Un booleen (estSerie) : true si l'anaacte correspond à une serie, false dans le cas contraire\n - un tableau avec la liste des demandes qui correspondent au meme anaacte et qui ne sont pas achevées",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "api\/estSerie\/:anaacte_id\/:user_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/facture\/pdf\/{facture_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "api\/facture\/pdf\/:facture_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/listeIcones",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "api\/listeIcones",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/exclusionsAnatypeObservation\/{observation_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "api\/exclusionsAnatypeObservation\/:observation_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "api\/exclusionsAnaacteObservation\/{observation_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "api\/exclusionsAnaacteObservation\/:observation_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "essai",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "essai",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "consentement",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "consentement",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "essai\/store",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "essai\/store",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "\/",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "\/",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "accueil",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "accueil",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "veterinaires",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "veterinaires",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "eleveurs",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "eleveurs",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "cavaliers",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "cavaliers",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "analyses\/coproscopies",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "analyses\/coproscopies",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "analyses\/choisir",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "analyses\/choisir",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "analyses\/enpratique",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "analyses\/enpratique",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "analyses\/interpretation",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "analyses\/interpretation",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "parasitisme",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "parasitisme",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "parasitisme\/fondamentaux\/{id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "parasitisme\/fondamentaux\/:id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "blog",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Utilisation de cette fonction pour afficher les articles avec du javascript\nd'où le rajout d'attributs: date, auteur, motsclefs",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "blog\/:blog",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "express\/tarifs",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "express\/tarifs",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "express\/envoiKit",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "express\/envoiKit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "express\/envoiKitStore",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "express\/envoiKitStore",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "infos\/quisommesnous",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "infos\/quisommesnous",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Renvoi la vue contact",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "infos\/contact",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "Undocumented function long description",
                        "response": []
                    }
                },
                {
                    "name": "infos\/infos-legales",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "infos\/infos-legales",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "infos\/aide",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "infos\/aide",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "infos\/rgpd",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "infos\/rgpd",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "presentation",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "presentation",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "parasitisme\/motclef\/{motclef_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "parasitisme\/motclef\/:motclef_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the application's login form.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "login",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Handle a login request to the application.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "login",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Log the user out of the application.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "logout",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the form to request a password reset link.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "password\/reset",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Send a reset link to the given user.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "password\/email",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the password reset view for the given token.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "password\/reset\/:token",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "If no token is present, display the link request form.",
                        "response": []
                    }
                },
                {
                    "name": "Reset the given user's password.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "password\/reset",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the password confirmation view.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "password\/confirm",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Confirm the given user's password.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "password\/confirm",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "eleveur",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "eleveur",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "eleveur\/{id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "eleveur\/:id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "eleveur",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "eleveur",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "eleveur\/demande\/{demande_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "eleveur\/demande\/:demande_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "resultatPdf\/eleveur\/{demande_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "resultatPdf\/eleveur\/:demande_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "eleveur\/factures",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "eleveur\/factures",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "eleveur\/factures\/{id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "eleveur\/factures\/:id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "eleveur\/serie\/{serie_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "eleveur\/serie\/:serie_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "veterinaire",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "veterinaire",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "veterinaire\/{id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "veterinaire\/:id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "veterinaire",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "veterinaire",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "veterinaire\/demande\/{demande_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "veterinaire\/demande\/:demande_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "veterinaire\/serie\/{serie_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "veterinaire\/serie\/:serie_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "resultatPdf\/veto\/{demande_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "resultatPdf\/veto\/:demande_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "personnel",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "personnel",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "routeur\/serie\/{serie_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "routeur\/serie\/:serie_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "routeur\/demande\/{demande_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "routeur\/demande\/:demande_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "deletemoi\/{id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "deletemoi\/:id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "jemedelete\/{id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "jemedelete\/:id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "facturePdf\/{id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "facturePdf\/:id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "resultatsPdf\/{id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "resultatsPdf\/:id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "exports\/choix",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "exports\/choix",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Exportation d'une demande d'analyse seule (disponible dans demandeShow)",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "exports\/demande\/:demande_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Requête ajax dans la page choix pour afficher uniquement les parasites d'une espece donnée.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "exports\/anaitemsFromEspece\/:especes",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Renvoie le nombre d'enregistrement en fonction des critères: especes, parasites, éleveur, veterinaire, dates",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "exports\/comptage",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "exports\/export",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "exports\/export",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Fait la requete pour connnaitres les enregistrements correspondant aux critères",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "exports\/resultats",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/analyses",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/analyses\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/analyses",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/analyses\/:analysis",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/analyses\/:analysis\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Met à jour les associations entre analyse et anaitem.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/analyses\/:analysis",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/analyses\/:analysis",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/anaactes",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/anaactes\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/anaactes",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/anaactes\/:anaacte",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/anaactes\/:anaacte\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/anaactes\/:anaacte",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/anaactes\/:anaacte",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/anatypes",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/anatypes\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/anatypes",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/anatypes\/:anatype",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/anatypes\/:anatype\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/anatypes\/:anatype",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/anatypes\/:anatype",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/anaitems",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/anaitems\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/anaitems",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/anaitems\/:anaitem",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/anaitems\/:anaitem\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/anaitems\/:anaitem",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/anaitems\/:anaitem",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/unites",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/unites\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/unites",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/unites\/:unite",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/unites\/:unite\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/unites\/:unite",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/unites\/:unite",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/demandes\/modif\/{demande_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/demandes\/modif\/:demande_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/demandes",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/demandes",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/demandes\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/demandes",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/demandes\/:demande",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Saisie des résulats d'une analyse",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/demandes\/:demande\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Modifie les caractéristiques d'une demande d'analyse (retour de la fontion modif)",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/demandes\/:demande",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/demandes\/:demande",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Methode de confirmation de suppression d'un prélévement",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/prelevement\/suppr\/:prelevement_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/prelevement",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/prelevement\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/prelevement",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/prelevement\/:prelevement",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/prelevement\/:prelevement\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/prelevement\/:prelevement",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/prelevement\/:prelevement",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Montre le formulaire pour renseigner 1 seul prélèvement d'une demande",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/prelevement\/createOne\/:demande_id\/:rang",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Montre le formulaire pour renseigner TOUS les prélèvements d'une demande",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/prelevement\/createOnDemande\/:demande_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Enregistre les données d'un SEUL prélèvement d'une demande (prélèvement non encore renseigné)",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/prelevement\/storeOne",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Enregistre les données de l'ensemble des prélèvements d'une demande",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/prelevement\/storeOnDemande",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/demandes\/{demande_id}\/paillasse",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/demandes\/:demande_id\/paillasse",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/signer\/{demande_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/signer\/:demande_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/envoyer\/{destinataire_id}\/{demande_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/envoyer\/:destinataire_id\/:demande_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/envoyer_facture\/{facture_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/envoyer_facture\/:facture_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/envoyer_tous\/{destinataire_id}\/{demande_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/envoyer_tous\/:destinataire_id\/:demande_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/user",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/user\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/user",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/user\/:user",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/user\/:user\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/user\/:user",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/user\/:user",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/laboAdmin",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/laboAdmin\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/laboAdmin",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/laboAdmin\/:laboAdmin",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/laboAdmin\/:laboAdmin\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/laboAdmin\/:laboAdmin",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/laboAdmin\/:laboAdmin",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/vetoAdmin\/createOnDemande",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/vetoAdmin\/createOnDemande",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/vetoAdmin",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/vetoAdmin\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/vetoAdmin",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/vetoAdmin\/:vetoAdmin",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/vetoAdmin\/:vetoAdmin\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/vetoAdmin\/:vetoAdmin",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/vetoAdmin\/:vetoAdmin",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/eleveurAdmin",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/eleveurAdmin\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/eleveurAdmin",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/eleveurAdmin\/:eleveurAdmin",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/eleveurAdmin\/:eleveurAdmin\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/eleveurAdmin\/:eleveurAdmin",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/eleveurAdmin\/:eleveurAdmin",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/troupeau",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/troupeau\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/troupeau",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/troupeau\/:troupeau",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/troupeau\/:troupeau\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/troupeau\/:troupeau",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/troupeau\/:troupeau",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/animal",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/animal\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/animal",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/animal\/:animal",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/animal\/:animal\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/animal\/:animal",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/animal\/:animal",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/typeprod",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/typeprod\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/typeprod",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/typeprod\/:typeprod",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/typeprod\/:typeprod\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/typeprod\/:typeprod",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/typeprod\/:typeprod",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/serie",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/serie\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/serie",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/serie\/:serie",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/serie\/:serie\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/serie\/:serie",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/serie\/:serie",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/usertypes",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/usertypes",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/resultats\/cloture\/{demande_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/resultats\/cloture\/:demande_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/resultats\/rouvrir\/{demande_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/resultats\/rouvrir\/:demande_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/pythie\/{commentaire_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/pythie\/:commentaire_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/commentaire",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/commentaire\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/commentaire",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/commentaire\/:commentaire",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/commentaire\/:commentaire\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/commentaire\/:commentaire",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/commentaire\/:commentaire",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/resultats",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/resultats",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/resultats",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/resultats",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/resultats\/{resultat}\/edit",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/resultats\/:resultat\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/resultatPdf\/labo\/{demande_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/resultatPdf\/labo\/:demande_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Fonction pour créer une facture après avoir choisi le destinataire",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/factures\/create\/:destinataire_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Fonction pour créer une facture après avoir choisi le destinataire et la demande",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/factures\/create\/:destinataire_id\/:demande_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Fonction pour lister les factures à établir",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/factures\/etablir",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/facture\/paiement",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/facture\/paiement",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/factures",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Non utilisé à cause de la spéficité de l'établissement d'une facture: la création d'une facture dépend toujours d'un utilisateur\nIl s'agit donc de la fonction etablir ou createFromUser",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/factures\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Fonction appelée par la vue factureAEtablir issue de FactureController@etablir",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/factures",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/factures\/:facture",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/factures\/:facture\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/factures\/:facture",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/factures\/:facture",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/reglement",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/reglement\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/reglement",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/reglement\/:reglement",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/reglement\/:reglement\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/reglement\/:reglement",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/reglement\/:reglement",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/acte",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/acte\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/acte",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/acte\/:acte",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/acte\/:acte\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/acte\/:acte",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/acte\/:acte",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/blog\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/blog",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/blog\/:blog\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/blog\/:blog",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/blog\/:blog",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/traductions",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/traductions",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "affiche la liste des icone pour suppression en cliquant dessus",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/icones\/suppression",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/icones",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/icones\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/icones",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/icones\/:icone",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/icones\/:icone\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/icones\/:icone",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/icones\/:icone",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/algorithme",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/observations",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/observations\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/observations",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/observations\/:observation",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/observations\/:observation\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/observations\/:observation",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/observations\/:observation",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/algorithme\/observations\/age\/{age_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/observations\/age\/:age_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/algorithme\/observations\/espece\/{espece_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/observations\/espece\/:espece_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/algorithme\/observations\/age\/{age_id}\/{observation_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/observations\/age\/:age_id\/:observation_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/algorithme\/observations\/espece\/{espece_id}\/{observation_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/observations\/espece\/:espece_id\/:observation_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "modifie l'association d'une observation à une espece ou a un age",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/observation\/animal\/:observation_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Modification des associations entre observation et anatype",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/observation\/anatype\/:observation_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/options",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/options\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/options",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/options\/:option",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/options\/:option\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/options\/:option",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/options\/:option",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/algorithme\/analyses\/age\/{age_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/analyses\/age\/:age_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/algorithme\/analyses\/espece\/{espece_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/analyses\/espece\/:espece_id",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Modification des associations entre anaacte et espece ou age",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/analyses\/animal\/:id",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/agesAlgo",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/agesAlgo\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/agesAlgo",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/agesAlgo\/:agesAlgo",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/agesAlgo\/:agesAlgo\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/agesAlgo\/:agesAlgo",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/agesAlgo\/:agesAlgo",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/especesAlgo",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/especesAlgo\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/especesAlgo",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/especesAlgo\/:especesAlgo",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/especesAlgo\/:especesAlgo\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/especesAlgo\/:especesAlgo",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/especesAlgo\/:especesAlgo",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/exclusions",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/exclusions\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/exclusions",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/exclusions\/:exclusion",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for editing the specified resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/exclusions\/:exclusion\/edit",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Update the specified resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/exclusions\/:exclusion",
                            "query": []
                        },
                        "method": "PUT",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/exclusions\/:exclusion",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/algorithme\/exclusion\/destroyObservation\/{observation_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/exclusion\/destroyObservation\/:observation_id",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/algorithme\/exclusion\/destroyEspece\/{observation_id}\/{espece_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/exclusion\/destroyEspece\/:observation_id\/:espece_id",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/algorithme\/exclusion\/destroyAge\/{observation_id}\/{age_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/exclusion\/destroyAge\/:observation_id\/:age_id",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Display a listing of the resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/exclusionsAnaacte",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Show the form for creating a new resource.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/exclusionsAnaacte\/create",
                            "query": []
                        },
                        "method": "GET",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Store a newly created resource in storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/exclusionsAnaacte",
                            "query": []
                        },
                        "method": "POST",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "Remove the specified resource from storage.",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/exclusionsAnaacte\/:exclusionsAnaacte",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/algorithme\/exclusions\/destroyObservation\/{observation_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/exclusions\/destroyObservation\/:observation_id",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/algorithme\/exclusions\/destroyEspece\/{observation_id}\/{espece_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/exclusions\/destroyEspece\/:observation_id\/:espece_id",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                },
                {
                    "name": "laboratoire\/algorithme\/exclusions\/destroyAge\/{observation_id}\/{age_id}",
                    "request": {
                        "url": {
                            "protocol": "http",
                            "host": "localhost\/parasitlab\/public",
                            "path": "laboratoire\/algorithme\/exclusions\/destroyAge\/:observation_id\/:age_id",
                            "query": []
                        },
                        "method": "DELETE",
                        "header": [
                            {
                                "key": "Content-Type",
                                "value": "application\/json"
                            },
                            {
                                "key": "Accept",
                                "value": "application\/json"
                            }
                        ],
                        "body": {
                            "mode": "raw",
                            "raw": "[]"
                        },
                        "description": "",
                        "response": []
                    }
                }
            ]
        }
    ]
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET doc.json</code></p>
<!-- END_cd4a874127cd23508641c63b640ee838 -->
<!-- START_404950476ada24c6283c68c8bb01e32c -->
<h2>api/especes</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/api/especes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/api/especes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">[
    {
        "id": 2,
        "nom": "Ovins",
        "abbreviation": "ov",
        "icone_id": 5
    },
    {
        "id": 3,
        "nom": "Caprins",
        "abbreviation": "cp",
        "icone_id": 3
    },
    {
        "id": 5,
        "nom": "Bovins",
        "abbreviation": "bv",
        "icone_id": 2
    },
    {
        "id": 6,
        "nom": "Porcins",
        "abbreviation": "pc",
        "icone_id": 6
    },
    {
        "id": 7,
        "nom": "Chevaux",
        "abbreviation": "cv",
        "icone_id": 4
    },
    {
        "id": 8,
        "nom": "Ânes",
        "abbreviation": "ane",
        "icone_id": 26
    }
]</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/especes</code></p>
<!-- END_404950476ada24c6283c68c8bb01e32c -->
<!-- START_72569117537628547c898a5fe4acd1a5 -->
<h2>api/ages/{espece_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/api/ages/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/api/ages/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">[]</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/ages/{espece_id}</code></p>
<!-- END_72569117537628547c898a5fe4acd1a5 -->
<!-- START_bdb04206e3e7f38a01d8f1a56a08ce4b -->
<h2>api/troupeau/{eleveur_id}/{espece_nom}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/api/troupeau/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/api/troupeau/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/troupeau/{eleveur_id}/{espece_nom}</code></p>
<!-- END_bdb04206e3e7f38a01d8f1a56a08ce4b -->
<!-- START_3f582fc0afd27a2e0b075a4ec57bd84c -->
<h2>api/animal/{troupeau_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/api/animal/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/api/animal/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">[
    {
        "id": 7,
        "troupeau_id": 1,
        "numero": "Albertine",
        "nom": null
    },
    {
        "id": 8,
        "troupeau_id": 1,
        "numero": "91007",
        "nom": null
    }
]</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/animal/{troupeau_id}</code></p>
<!-- END_3f582fc0afd27a2e0b075a4ec57bd84c -->
<!-- START_fec705233f20f3dd2f0f66af99e0ccc2 -->
<h2>api/observations/especes/{espece_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/api/observations/especes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/api/observations/especes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">[]</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/observations/especes/{espece_id}</code></p>
<!-- END_fec705233f20f3dd2f0f66af99e0ccc2 -->
<!-- START_38ab5a7e959ab9bdf9510eb71f9481d6 -->
<h2>api/observations/ages/{age_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/api/observations/ages/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/api/observations/ages/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">[
    {
        "id": 21,
        "intitule": "Je veux connaître la situation de mon troupeau",
        "explication": "La réalisation d'examens coproscopiques viendra compléter les observations faites sur les animaux",
        "autres": null,
        "categorie_id": 2,
        "ordre": 1,
        "age_id": 1,
        "observation_id": 21
    },
    {
        "id": 23,
        "intitule": "Je veux connaître la situation d'un animal",
        "explication": "La réalisation d'examens coproscopiques viendra compléter les observations faites sur cet animal",
        "autres": null,
        "categorie_id": 2,
        "ordre": 1,
        "age_id": 1,
        "observation_id": 23
    },
    {
        "id": 2,
        "intitule": "J’observe une baisse de production de lait",
        "explication": "Les infestations parasitaires provoquent souvent des baisses de production.",
        "autres": "alimentation insuffisante ou déséquilibrée, infections chroniques, stress, etc.",
        "categorie_id": 1,
        "ordre": 2,
        "age_id": 1,
        "observation_id": 2
    },
    {
        "id": 16,
        "intitule": "Je rentre mon troupeau en bâtiment",
        "explication": "C'est le moment de faire une évaluation de la situation parasitaire",
        "autres": null,
        "categorie_id": 2,
        "ordre": 2,
        "age_id": 1,
        "observation_id": 16
    },
    {
        "id": 18,
        "intitule": "C'est le début de l'hiver",
        "explication": "C'est le moment de faire une évaluation de la situation parasitaire",
        "autres": null,
        "categorie_id": 2,
        "ordre": 3,
        "age_id": 1,
        "observation_id": 18
    },
    {
        "id": 29,
        "intitule": "J'ai régulièrement des foies saisis pour petite douve",
        "explication": "C'est un signe assez sûr d'infestation des animaux",
        "autres": null,
        "categorie_id": 3,
        "ordre": 3,
        "age_id": 1,
        "observation_id": 29
    },
    {
        "id": 19,
        "intitule": "Je vais sortir mes animaux à l'herbe",
        "explication": "Si vous n'avez pas évalué le parasitisme de votre troupeau à la rentrée en bâtiment, il est encore temps de le faire",
        "autres": null,
        "categorie_id": 2,
        "ordre": 4,
        "age_id": 1,
        "observation_id": 19
    },
    {
        "id": 27,
        "intitule": "Mes animaux ont accès à des pâturages humides",
        "explication": "Attention aux infestations par la grande douve et le paramphistome",
        "autres": null,
        "categorie_id": 3,
        "ordre": 4,
        "age_id": 1,
        "observation_id": 27
    },
    {
        "id": 28,
        "intitule": "J'ai régulièrement des foies saisis pour grande douve",
        "explication": "C'est un signe assez sûr d'infestation des animaux",
        "autres": null,
        "categorie_id": 3,
        "ordre": 5,
        "age_id": 1,
        "observation_id": 28
    },
    {
        "id": 5,
        "intitule": "J'ai des animaux qui ont un mauvais poil",
        "explication": "Un mauvais poil peut être signe de parasitisme interne.",
        "autres": "carences alimentaires, des parasites externes (poux, gâles, ...).",
        "categorie_id": 1,
        "ordre": 6,
        "age_id": 1,
        "observation_id": 5
    },
    {
        "id": 13,
        "intitule": "Je viens d'acheter un animal",
        "explication": "Il risque d'introduire du parasitisme dans votre troupeau et même peut-être des parasites résistants à certains vermifuges.",
        "autres": null,
        "categorie_id": 2,
        "ordre": 6,
        "age_id": 1,
        "observation_id": 13
    },
    {
        "id": 6,
        "intitule": "J'ai des animaux qui ont de la diarrhée",
        "explication": "Les strongles intestinaux, le paramphistome ou la grande douve peuvent provoquer de la diarrhée.",
        "autres": "déséquilibre alimentaire, changement alimentaire, mise à l'herbe, infections intestinales.",
        "categorie_id": 1,
        "ordre": 7,
        "age_id": 1,
        "observation_id": 6
    },
    {
        "id": 8,
        "intitule": "J'ai des animaux qui toussent",
        "explication": "La toux d'été est souvent provoquée par des strongles respiratoires.",
        "autres": "infections respiratoires, allergies, ...",
        "categorie_id": 1,
        "ordre": 8,
        "age_id": 1,
        "observation_id": 8
    },
    {
        "id": 12,
        "intitule": "J'ai fait un traitement avec un vermifuge et la situation ne s'est pas améliorée",
        "explication": "Si votre animal était vraiment parasité et que le traitement était adapté, vous êtes peut-être face à une résistance au vermifuge utilisé.",
        "autres": "mauvais diagnostic, traitement inadapté ou mal administré (sous-dosage).",
        "categorie_id": 2,
        "ordre": 8,
        "age_id": 1,
        "observation_id": 12
    },
    {
        "id": 7,
        "intitule": "J'ai des animaux qui meurent",
        "explication": "Une très forte infestation parasitaire peut provoquer la mort des animaux. C'est souvent le cas chez les petits ruminants infestés par Haemonchus contortus.",
        "autres": "accidents, maladies diverses, etc.",
        "categorie_id": 1,
        "ordre": 13,
        "age_id": 1,
        "observation_id": 7
    }
]</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/observations/ages/{age_id}</code></p>
<!-- END_38ab5a7e959ab9bdf9510eb71f9481d6 -->
<!-- START_be678680aa949b72c6de926b3937cf50 -->
<h2>api/options</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/api/options" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/api/options"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST api/options</code></p>
<!-- END_be678680aa949b72c6de926b3937cf50 -->
<!-- START_73c4aa3df7db3c273af16434a1b5b79d -->
<h2>api/anaactes/{anatype_id}/{espece}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/api/anaactes/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/api/anaactes/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">[
    {
        "id": 1,
        "num": "1.a",
        "abbreviation": "indiv.",
        "nom": "analyse unitaire (1 animal ou 1 mélange)",
        "description": "C'est une analyse conseillée, quand vous voulez connaître la situation d'un animal (prélèvement unique) ou d'un lot d'animaux (prélèvement de mélange).",
        "anatype_id": 1,
        "estSerie": 0,
        "propPrelev": 1,
        "estActif": 1,
        "estAnalyse": 1,
        "estTarif": 1,
        "icone_id": 9,
        "pu_ht": "14.60",
        "tva_id": 1
    },
    {
        "id": 2,
        "num": "1.b",
        "abbreviation": "mélange de 5",
        "nom": "analyse de mélange (5 animaux maximum)",
        "description": "Une analyse de mélange, vous permettra d'évaluer la situation d'un groupe à moindre coût.",
        "anatype_id": 1,
        "estSerie": 0,
        "propPrelev": 0,
        "estActif": 0,
        "estAnalyse": 1,
        "estTarif": 1,
        "icone_id": 9,
        "pu_ht": "16.90",
        "tva_id": 1
    },
    {
        "id": 3,
        "num": "1.c",
        "abbreviation": "multiple",
        "nom": "analyses individuelles multiples",
        "description": "Si vous souhaitez des analyses individuelles sur plusieurs animaux",
        "anatype_id": 1,
        "estSerie": 0,
        "propPrelev": 1,
        "estActif": 0,
        "estAnalyse": 1,
        "estTarif": 1,
        "icone_id": 9,
        "pu_ht": "11.00",
        "tva_id": 1
    },
    {
        "id": 4,
        "num": "1.d",
        "abbreviation": "suivi annuel",
        "nom": "pack de suivi annuel (4 envois de 3 échantillons)",
        "description": "Il s'agit là du meilleur outil pour suivre la situation de votre troupeau pendant la mise en place d'une gestion du pâturage.",
        "anatype_id": 1,
        "estSerie": 1,
        "propPrelev": 0,
        "estActif": 1,
        "estAnalyse": 1,
        "estTarif": 1,
        "icone_id": 9,
        "pu_ht": "130.00",
        "tva_id": 1
    },
    {
        "id": 15,
        "num": "1.e",
        "abbreviation": "pack 3 anal.",
        "nom": "pack de 3 échantillons de mélanges (5 animaux)",
        "description": "C'est une analyse assez complète qui vous fournira une estimation des différents niveaux d'infestation au sein de votre troupeau en fonction de l'âge ou de l'état des animaux.",
        "anatype_id": 1,
        "estSerie": 0,
        "propPrelev": 0,
        "estActif": 0,
        "estAnalyse": 1,
        "estTarif": 1,
        "icone_id": 9,
        "pu_ht": "42.00",
        "tva_id": 1
    }
]</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/anaactes/{anatype_id}/{espece}</code></p>
<!-- END_73c4aa3df7db3c273af16434a1b5b79d -->
<!-- START_87dc6f6fdc1710e00f5d4a1ba5e2331d -->
<h2>api/anatypes/{espece}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/api/anatypes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/api/anatypes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/anatypes/{espece}</code></p>
<!-- END_87dc6f6fdc1710e00f5d4a1ba5e2331d -->
<!-- START_a5f59e0a22905f6da220fdb5dadebcf8 -->
<h2>REQUETE AJAX DE CreateDemande.js <strong><strong><strong><strong><strong><strong>**</strong></strong></strong></strong></strong></strong></h2>
<p>METHODES POUR AIDER A LA SAISIE D&#039;UNE NOUVELLE DEMANDE ET VERIFIANT SI CETTE DEMANDE RENVOIE A UNE serie
VOIRE UNE SERIE DEJA EXISTANTE
Méthode qui renvoie un json (liste) qui comprend:</p>
<ul>
<li>Un booleen (estSerie) : true si l&#039;anaacte correspond à une serie, false dans le cas contraire</li>
<li>un tableau avec la liste des demandes qui correspondent au meme anaacte et qui ne sont pas achevées</li>
</ul>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/api/estSerie/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/api/estSerie/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">{
    "estSerie": 0
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/estSerie/{anaacte_id}/{user_id}</code></p>
<!-- END_a5f59e0a22905f6da220fdb5dadebcf8 -->
<!-- START_792b72fcd4878145eba7282066945368 -->
<h2>api/facture/pdf/{facture_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/api/facture/pdf/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/api/facture/pdf/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/facture/pdf/{facture_id}</code></p>
<!-- END_792b72fcd4878145eba7282066945368 -->
<!-- START_75925ab9733e0bbd7f1bb5d1888fc9c6 -->
<h2>api/listeIcones</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/api/listeIcones" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/api/listeIcones"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">[
    "default.svg",
    "bv.svg",
    "cp.svg",
    "cv.svg",
    "ov.svg",
    "pc.svg",
    "pr.svg",
    "tout.svg",
    "copr.svg",
    "baer.svg",
    "eleveur.svg",
    "labo.svg",
    "webmin.svg",
    "veto.svg",
    "haem.svg",
    "pack.svg",
    "inte.svg",
    "visi.svg",
    "depl.svg",
    "mela.svg",
    "users.svg",
    "suiv.svg",
    "resi.svg",
    "envo.svg",
    "espece.svg",
    "ane.svg",
    "equides.svg",
    "cash.svg",
    "virement.svg",
    "cheque.svg",
    "fasc.svg",
    "dicr.svg",
    "vl.svg",
    "jb.svg",
    "acheve.svg",
    "acte.svg",
    "actions.svg",
    "ajouter.svg",
    "analyse.svg",
    "analyse_nouvelle.svg",
    "blog.svg",
    "cas_equides.svg",
    "choisir.svg",
    "contact.svg",
    "cv_rond.svg",
    "date.svg",
    "demandes.svg",
    "eleveur_rond.svg",
    "email.svg",
    "enpratique.svg",
    "entomo.svg",
    "entravaux.svg",
    "envoye.svg",
    "especes.svg",
    "exclusions.svg",
    "factures.svg",
    "felicitations.svg",
    "fibl-logo.svg",
    "fleche_gauche.svg",
    "formulaire_ligne.svg",
    "formulaire_vierge.svg",
    "horaires.svg",
    "icones.svg",
    "inacheve.svg",
    "inconnu.svg",
    "info_blanc.svg",
    "infoslegales.svg",
    "interpreter.svg",
    "microscope.svg",
    "modifier.svg",
    "nouveau.svg",
    "observation_add.svg",
    "observations.svg",
    "oeuf.jpg",
    "oeuf.jpg.webp",
    "pack-envoi.svg",
    "pack-envoi-vide.svg",
    "parasitisme.svg",
    "pas_fini.svg",
    "prelevement.svg",
    "prelever.svg",
    "question.svg",
    "question2.svg",
    "saisie.svg",
    "saisie_faite.svg",
    "saisie_faite_signee.svg",
    "saisie_non_faite.svg",
    "serie.svg",
    "signature.svg",
    "situation.svg",
    "telephone.svg",
    "veto_rond.svg",
    "why.svg",
    "marcheur.svg",
    "enveloppe.svg"
]</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/listeIcones</code></p>
<!-- END_75925ab9733e0bbd7f1bb5d1888fc9c6 -->
<!-- START_b85c4c457f970c775727356f8bff5c8c -->
<h2>api/exclusionsAnatypeObservation/{observation_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/api/exclusionsAnatypeObservation/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/api/exclusionsAnatypeObservation/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">[
    {
        "id": 21,
        "espece_id": 5,
        "age_id": 2,
        "anatype_id": 2,
        "observation_id": 1
    }
]</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/exclusionsAnatypeObservation/{observation_id}</code></p>
<!-- END_b85c4c457f970c775727356f8bff5c8c -->
<!-- START_45c14d66cb233fb0413d3b6a6d481703 -->
<h2>api/exclusionsAnaacteObservation/{observation_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/api/exclusionsAnaacteObservation/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/api/exclusionsAnaacteObservation/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">[
    {
        "id": 1,
        "espece_id": 2,
        "age_id": null,
        "anaacte_id": 1,
        "observation_id": 1
    },
    {
        "id": 3,
        "espece_id": 2,
        "age_id": null,
        "anaacte_id": 4,
        "observation_id": 1
    },
    {
        "id": 4,
        "espece_id": 2,
        "age_id": null,
        "anaacte_id": 5,
        "observation_id": 1
    },
    {
        "id": 5,
        "espece_id": 2,
        "age_id": null,
        "anaacte_id": 7,
        "observation_id": 1
    },
    {
        "id": 6,
        "espece_id": 2,
        "age_id": null,
        "anaacte_id": 9,
        "observation_id": 1
    },
    {
        "id": 8,
        "espece_id": 2,
        "age_id": null,
        "anaacte_id": 13,
        "observation_id": 1
    },
    {
        "id": 9,
        "espece_id": 3,
        "age_id": null,
        "anaacte_id": 1,
        "observation_id": 1
    },
    {
        "id": 10,
        "espece_id": 3,
        "age_id": null,
        "anaacte_id": 4,
        "observation_id": 1
    },
    {
        "id": 11,
        "espece_id": 3,
        "age_id": null,
        "anaacte_id": 5,
        "observation_id": 1
    },
    {
        "id": 12,
        "espece_id": 3,
        "age_id": null,
        "anaacte_id": 8,
        "observation_id": 1
    },
    {
        "id": 13,
        "espece_id": 3,
        "age_id": null,
        "anaacte_id": 9,
        "observation_id": 1
    },
    {
        "id": 129,
        "espece_id": 5,
        "age_id": 2,
        "anaacte_id": 12,
        "observation_id": 1
    },
    {
        "id": 130,
        "espece_id": 5,
        "age_id": null,
        "anaacte_id": 1,
        "observation_id": 1
    },
    {
        "id": 131,
        "espece_id": 5,
        "age_id": 1,
        "anaacte_id": 1,
        "observation_id": 1
    },
    {
        "id": 132,
        "espece_id": 5,
        "age_id": 2,
        "anaacte_id": 1,
        "observation_id": 1
    },
    {
        "id": 133,
        "espece_id": 2,
        "age_id": null,
        "anaacte_id": 3,
        "observation_id": 1
    },
    {
        "id": 134,
        "espece_id": 3,
        "age_id": null,
        "anaacte_id": 3,
        "observation_id": 1
    },
    {
        "id": 135,
        "espece_id": 5,
        "age_id": null,
        "anaacte_id": 3,
        "observation_id": 1
    },
    {
        "id": 136,
        "espece_id": 5,
        "age_id": 1,
        "anaacte_id": 3,
        "observation_id": 1
    },
    {
        "id": 137,
        "espece_id": 5,
        "age_id": 2,
        "anaacte_id": 3,
        "observation_id": 1
    },
    {
        "id": 138,
        "espece_id": 5,
        "age_id": null,
        "anaacte_id": 4,
        "observation_id": 1
    },
    {
        "id": 139,
        "espece_id": 5,
        "age_id": 1,
        "anaacte_id": 4,
        "observation_id": 1
    },
    {
        "id": 140,
        "espece_id": 5,
        "age_id": 2,
        "anaacte_id": 4,
        "observation_id": 1
    },
    {
        "id": 141,
        "espece_id": 5,
        "age_id": null,
        "anaacte_id": 5,
        "observation_id": 1
    },
    {
        "id": 142,
        "espece_id": 5,
        "age_id": 1,
        "anaacte_id": 5,
        "observation_id": 1
    },
    {
        "id": 143,
        "espece_id": 5,
        "age_id": 2,
        "anaacte_id": 5,
        "observation_id": 1
    },
    {
        "id": 144,
        "espece_id": 3,
        "age_id": null,
        "anaacte_id": 7,
        "observation_id": 1
    },
    {
        "id": 145,
        "espece_id": 5,
        "age_id": null,
        "anaacte_id": 7,
        "observation_id": 1
    },
    {
        "id": 146,
        "espece_id": 5,
        "age_id": 1,
        "anaacte_id": 7,
        "observation_id": 1
    },
    {
        "id": 147,
        "espece_id": 5,
        "age_id": 2,
        "anaacte_id": 7,
        "observation_id": 1
    },
    {
        "id": 148,
        "espece_id": 2,
        "age_id": null,
        "anaacte_id": 8,
        "observation_id": 1
    },
    {
        "id": 149,
        "espece_id": 5,
        "age_id": null,
        "anaacte_id": 8,
        "observation_id": 1
    },
    {
        "id": 150,
        "espece_id": 5,
        "age_id": 1,
        "anaacte_id": 8,
        "observation_id": 1
    },
    {
        "id": 151,
        "espece_id": 5,
        "age_id": 2,
        "anaacte_id": 8,
        "observation_id": 1
    },
    {
        "id": 152,
        "espece_id": 5,
        "age_id": null,
        "anaacte_id": 9,
        "observation_id": 1
    },
    {
        "id": 153,
        "espece_id": 5,
        "age_id": 1,
        "anaacte_id": 9,
        "observation_id": 1
    },
    {
        "id": 154,
        "espece_id": 5,
        "age_id": 2,
        "anaacte_id": 9,
        "observation_id": 1
    }
]</code></pre>
<h3>HTTP Request</h3>
<p><code>GET api/exclusionsAnaacteObservation/{observation_id}</code></p>
<!-- END_45c14d66cb233fb0413d3b6a6d481703 -->
<!-- START_df785398582490ae2e8485c0edc81c01 -->
<h2>essai</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/essai" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/essai"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET essai</code></p>
<!-- END_df785398582490ae2e8485c0edc81c01 -->
<!-- START_1f2e2005325457c0a8b5dcd2656f8704 -->
<h2>consentement</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/consentement" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/consentement"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST consentement</code></p>
<!-- END_1f2e2005325457c0a8b5dcd2656f8704 -->
<!-- START_d16e4bc0b7a66513869e2499a461e57b -->
<h2>essai/store</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/essai/store" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/essai/store"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST essai/store</code></p>
<!-- END_d16e4bc0b7a66513869e2499a461e57b -->
<!-- START_53be1e9e10a08458929a2e0ea70ddb86 -->
<h2>/</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET /</code></p>
<!-- END_53be1e9e10a08458929a2e0ea70ddb86 -->
<!-- START_21ec72c5dc4a01194aac23bffa12b7bf -->
<h2>accueil</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/accueil" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/accueil"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET accueil</code></p>
<!-- END_21ec72c5dc4a01194aac23bffa12b7bf -->
<!-- START_c36d7fe50e933a84f7c9f0991a451814 -->
<h2>veterinaires</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/veterinaires" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/veterinaires"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET veterinaires</code></p>
<!-- END_c36d7fe50e933a84f7c9f0991a451814 -->
<!-- START_5ef3e4e27560d7c1bbc24f529b86f016 -->
<h2>eleveurs</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/eleveurs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/eleveurs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET eleveurs</code></p>
<!-- END_5ef3e4e27560d7c1bbc24f529b86f016 -->
<!-- START_845daece57dfaed61c4b9b266ed74352 -->
<h2>cavaliers</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/cavaliers" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/cavaliers"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET cavaliers</code></p>
<!-- END_845daece57dfaed61c4b9b266ed74352 -->
<!-- START_982d151855ba18256e402ed7c09e730b -->
<h2>analyses/coproscopies</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/analyses/coproscopies" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/analyses/coproscopies"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET analyses/coproscopies</code></p>
<!-- END_982d151855ba18256e402ed7c09e730b -->
<!-- START_4dbefae2e3d1e2b1dfebd3fb15fd2cf1 -->
<h2>analyses/choisir</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/analyses/choisir" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/analyses/choisir"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET analyses/choisir</code></p>
<!-- END_4dbefae2e3d1e2b1dfebd3fb15fd2cf1 -->
<!-- START_28caece3a489b708a5da7f1272308804 -->
<h2>analyses/enpratique</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/analyses/enpratique" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/analyses/enpratique"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET analyses/enpratique</code></p>
<!-- END_28caece3a489b708a5da7f1272308804 -->
<!-- START_36dbc214cd3414a78321b09de7c848d3 -->
<h2>analyses/interpretation</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/analyses/interpretation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/analyses/interpretation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET analyses/interpretation</code></p>
<!-- END_36dbc214cd3414a78321b09de7c848d3 -->
<!-- START_1d092e694dbcab6480c424b466145be5 -->
<h2>parasitisme</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/parasitisme" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/parasitisme"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET parasitisme</code></p>
<!-- END_1d092e694dbcab6480c424b466145be5 -->
<!-- START_2e02987099339786e875aaf6d25983dc -->
<h2>parasitisme/fondamentaux/{id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/parasitisme/fondamentaux/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/parasitisme/fondamentaux/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET parasitisme/fondamentaux/{id}</code></p>
<!-- END_2e02987099339786e875aaf6d25983dc -->
<!-- START_edce5abaae0423582f973aa228d48044 -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/blog" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/blog"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET blog</code></p>
<!-- END_edce5abaae0423582f973aa228d48044 -->
<!-- START_cbb6e906e2d24521bdda95ba05af9a1f -->
<h2>Utilisation de cette fonction pour afficher les articles avec du javascript</h2>
<p>d&#039;où le rajout d&#039;attributs: date, auteur, motsclefs</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/blog/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/blog/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET blog/{blog}</code></p>
<!-- END_cbb6e906e2d24521bdda95ba05af9a1f -->
<!-- START_aace56ba769c5028c130cd1147d36d25 -->
<h2>express/tarifs</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/express/tarifs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/express/tarifs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET express/tarifs</code></p>
<!-- END_aace56ba769c5028c130cd1147d36d25 -->
<!-- START_6a53c34b1e29adcf1a36b49fd8d9e158 -->
<h2>express/envoiKit</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/express/envoiKit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/express/envoiKit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET express/envoiKit</code></p>
<!-- END_6a53c34b1e29adcf1a36b49fd8d9e158 -->
<!-- START_abe12d03e4f67a17eecff19227f725c0 -->
<h2>express/envoiKitStore</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/express/envoiKitStore" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/express/envoiKitStore"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST express/envoiKitStore</code></p>
<!-- END_abe12d03e4f67a17eecff19227f725c0 -->
<!-- START_08b42457ea1d1f94c8ddd38a899536e1 -->
<h2>infos/quisommesnous</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/infos/quisommesnous" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/infos/quisommesnous"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET infos/quisommesnous</code></p>
<!-- END_08b42457ea1d1f94c8ddd38a899536e1 -->
<!-- START_5ec1e2fe340a1f5d3b781ae910b9eb07 -->
<h2>Renvoi la vue contact</h2>
<p>Undocumented function long description</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/infos/contact" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/infos/contact"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET infos/contact</code></p>
<!-- END_5ec1e2fe340a1f5d3b781ae910b9eb07 -->
<!-- START_b789097632a9b754cddc5585b04fb750 -->
<h2>infos/infos-legales</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/infos/infos-legales" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/infos/infos-legales"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET infos/infos-legales</code></p>
<!-- END_b789097632a9b754cddc5585b04fb750 -->
<!-- START_7db1dce99c519f0da301033a3e357608 -->
<h2>infos/aide</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/infos/aide" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/infos/aide"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET infos/aide</code></p>
<!-- END_7db1dce99c519f0da301033a3e357608 -->
<!-- START_15ac306bc57750449904560e56a06840 -->
<h2>infos/rgpd</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/infos/rgpd" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/infos/rgpd"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET infos/rgpd</code></p>
<!-- END_15ac306bc57750449904560e56a06840 -->
<!-- START_01a32cea80c6bc2140323834fb20326d -->
<h2>presentation</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/presentation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/presentation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>GET presentation</code></p>
<!-- END_01a32cea80c6bc2140323834fb20326d -->
<!-- START_5c4cf1c69b85739dc4c7da1a28eb855c -->
<h2>parasitisme/motclef/{motclef_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/parasitisme/motclef/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/parasitisme/motclef/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (500):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET parasitisme/motclef/{motclef_id}</code></p>
<!-- END_5c4cf1c69b85739dc4c7da1a28eb855c -->
<!-- START_66e08d3cc8222573018fed49e121e96d -->
<h2>Show the application&#039;s login form.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET login</code></p>
<!-- END_66e08d3cc8222573018fed49e121e96d -->
<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
<h2>Handle a login request to the application.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST login</code></p>
<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->
<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
<h2>Log the user out of the application.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST logout</code></p>
<!-- END_e65925f23b9bc6b93d9356895f29f80c -->
<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
<h2>Display the form to request a password reset link.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET password/reset</code></p>
<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->
<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
<h2>Send a reset link to the given user.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST password/email</code></p>
<!-- END_feb40f06a93c80d742181b6ffb6b734e -->
<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
<h2>Display the password reset view for the given token.</h2>
<p>If no token is present, display the link request form.</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/password/reset/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (200):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET password/reset/{token}</code></p>
<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->
<!-- START_cafb407b7a846b31491f97719bb15aef -->
<h2>Reset the given user&#039;s password.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST password/reset</code></p>
<!-- END_cafb407b7a846b31491f97719bb15aef -->
<!-- START_b77aedc454e9471a35dcb175278ec997 -->
<h2>Display the password confirmation view.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET password/confirm</code></p>
<!-- END_b77aedc454e9471a35dcb175278ec997 -->
<!-- START_54462d3613f2262e741142161c0e6fea -->
<h2>Confirm the given user&#039;s password.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST password/confirm</code></p>
<!-- END_54462d3613f2262e741142161c0e6fea -->
<!-- START_36c8792e9bb378e2ef2e1339f7d30c57 -->
<h2>eleveur</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/eleveur" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/eleveur"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET eleveur</code></p>
<!-- END_36c8792e9bb378e2ef2e1339f7d30c57 -->
<!-- START_ff6781cd7a9421e7f4ccdaf6af5d4518 -->
<h2>eleveur/{id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/eleveur/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/eleveur/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET eleveur/{id}</code></p>
<!-- END_ff6781cd7a9421e7f4ccdaf6af5d4518 -->
<!-- START_ebf19006a0046eacd2bd6d994312da29 -->
<h2>eleveur</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/eleveur" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/eleveur"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST eleveur</code></p>
<!-- END_ebf19006a0046eacd2bd6d994312da29 -->
<!-- START_a6ff05771630249eaec4792fde5f4752 -->
<h2>eleveur/demande/{demande_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/eleveur/demande/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/eleveur/demande/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET eleveur/demande/{demande_id}</code></p>
<!-- END_a6ff05771630249eaec4792fde5f4752 -->
<!-- START_470a07e1a427adc244d7b7fc26e5a0e5 -->
<h2>resultatPdf/eleveur/{demande_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/resultatPdf/eleveur/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/resultatPdf/eleveur/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET resultatPdf/eleveur/{demande_id}</code></p>
<!-- END_470a07e1a427adc244d7b7fc26e5a0e5 -->
<!-- START_8c29145d32b1c9eb52f817468a304256 -->
<h2>eleveur/factures</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/eleveur/factures" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/eleveur/factures"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET eleveur/factures</code></p>
<!-- END_8c29145d32b1c9eb52f817468a304256 -->
<!-- START_fc844ad4a75a820d8d363f3232313259 -->
<h2>eleveur/factures/{id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/eleveur/factures/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/eleveur/factures/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET eleveur/factures/{id}</code></p>
<!-- END_fc844ad4a75a820d8d363f3232313259 -->
<!-- START_528699502ce87d2dbe014434856e0225 -->
<h2>eleveur/serie/{serie_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/eleveur/serie/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/eleveur/serie/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET eleveur/serie/{serie_id}</code></p>
<!-- END_528699502ce87d2dbe014434856e0225 -->
<!-- START_b0ff9feb2886223b96d492e664d75940 -->
<h2>veterinaire</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/veterinaire" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/veterinaire"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET veterinaire</code></p>
<!-- END_b0ff9feb2886223b96d492e664d75940 -->
<!-- START_baf6976c5bbf659b13063f18fcda8b97 -->
<h2>veterinaire/{id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/veterinaire/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/veterinaire/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET veterinaire/{id}</code></p>
<!-- END_baf6976c5bbf659b13063f18fcda8b97 -->
<!-- START_03e4c5534be9871eb811489198f7878e -->
<h2>veterinaire</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/veterinaire" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/veterinaire"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST veterinaire</code></p>
<!-- END_03e4c5534be9871eb811489198f7878e -->
<!-- START_18f72b546cda3d36b780e6b9fb298086 -->
<h2>veterinaire/demande/{demande_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/veterinaire/demande/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/veterinaire/demande/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET veterinaire/demande/{demande_id}</code></p>
<!-- END_18f72b546cda3d36b780e6b9fb298086 -->
<!-- START_3bc8d293f010311531692795b63c7669 -->
<h2>veterinaire/serie/{serie_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/veterinaire/serie/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/veterinaire/serie/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET veterinaire/serie/{serie_id}</code></p>
<!-- END_3bc8d293f010311531692795b63c7669 -->
<!-- START_b0196b0731cddf7729b51344baa0fea8 -->
<h2>resultatPdf/veto/{demande_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/resultatPdf/veto/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/resultatPdf/veto/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET resultatPdf/veto/{demande_id}</code></p>
<!-- END_b0196b0731cddf7729b51344baa0fea8 -->
<!-- START_c8b54407b3246d0a7bb0a01eebe5cee0 -->
<h2>personnel</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/personnel" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/personnel"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET personnel</code></p>
<!-- END_c8b54407b3246d0a7bb0a01eebe5cee0 -->
<!-- START_ec7f1b810a4622faeeed0adbb1945aec -->
<h2>routeur/serie/{serie_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/routeur/serie/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/routeur/serie/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET routeur/serie/{serie_id}</code></p>
<!-- END_ec7f1b810a4622faeeed0adbb1945aec -->
<!-- START_864384e773d0a6aca2a9356117364ff6 -->
<h2>routeur/demande/{demande_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/routeur/demande/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/routeur/demande/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET routeur/demande/{demande_id}</code></p>
<!-- END_864384e773d0a6aca2a9356117364ff6 -->
<!-- START_803e6da91bf95fd2fc4934a0a9674bd0 -->
<h2>deletemoi/{id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/deletemoi/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/deletemoi/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET deletemoi/{id}</code></p>
<!-- END_803e6da91bf95fd2fc4934a0a9674bd0 -->
<!-- START_4e0b70b8b5ed48cc793d4f4838c98928 -->
<h2>jemedelete/{id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/jemedelete/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/jemedelete/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET jemedelete/{id}</code></p>
<!-- END_4e0b70b8b5ed48cc793d4f4838c98928 -->
<!-- START_22168060eec4dabca5a6783b2fa2d11a -->
<h2>facturePdf/{id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/facturePdf/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/facturePdf/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET facturePdf/{id}</code></p>
<!-- END_22168060eec4dabca5a6783b2fa2d11a -->
<!-- START_67200e5dd34a5c04dae9c45c41a33380 -->
<h2>resultatsPdf/{id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/resultatsPdf/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/resultatsPdf/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET resultatsPdf/{id}</code></p>
<!-- END_67200e5dd34a5c04dae9c45c41a33380 -->
<!-- START_fb6218dc75a9a5ce2e63e833c44db840 -->
<h2>exports/choix</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/exports/choix" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/exports/choix"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET exports/choix</code></p>
<!-- END_fb6218dc75a9a5ce2e63e833c44db840 -->
<!-- START_4c1039efec1835833ceaa3ef857eb9d9 -->
<h2>Exportation d&#039;une demande d&#039;analyse seule (disponible dans demandeShow)</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/exports/demande/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/exports/demande/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET exports/demande/{demande_id}</code></p>
<!-- END_4c1039efec1835833ceaa3ef857eb9d9 -->
<!-- START_1557d9fb7754d61180f77f4a9da9957c -->
<h2>Requête ajax dans la page choix pour afficher uniquement les parasites d&#039;une espece donnée.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/exports/anaitemsFromEspece/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/exports/anaitemsFromEspece/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET exports/anaitemsFromEspece/{especes}</code></p>
<!-- END_1557d9fb7754d61180f77f4a9da9957c -->
<!-- START_1b3be5b393afdac0b65291c1eadf9924 -->
<h2>Renvoie le nombre d&#039;enregistrement en fonction des critères: especes, parasites, éleveur, veterinaire, dates</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/exports/comptage" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/exports/comptage"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST exports/comptage</code></p>
<!-- END_1b3be5b393afdac0b65291c1eadf9924 -->
<!-- START_89319d67b83a17e238bb836d1f5537a9 -->
<h2>exports/export</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/exports/export" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/exports/export"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST exports/export</code></p>
<!-- END_89319d67b83a17e238bb836d1f5537a9 -->
<!-- START_792f314983e63296fcaae9dad0d9dd03 -->
<h2>Fait la requete pour connnaitres les enregistrements correspondant aux critères</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/exports/resultats" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/exports/resultats"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET exports/resultats</code></p>
<!-- END_792f314983e63296fcaae9dad0d9dd03 -->
<!-- START_438c93355c5f188bf9277cdddf2b03bd -->
<h2>laboratoire</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire</code></p>
<!-- END_438c93355c5f188bf9277cdddf2b03bd -->
<!-- START_baed2b8edf49e87aa0e4baaea2588ad2 -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/analyses" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/analyses"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/analyses</code></p>
<!-- END_baed2b8edf49e87aa0e4baaea2588ad2 -->
<!-- START_dab710765a396f5d7ed9f2b1dd360e1f -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/analyses/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/analyses/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/analyses/create</code></p>
<!-- END_dab710765a396f5d7ed9f2b1dd360e1f -->
<!-- START_2d5379aefd6619ed2d81ae7d6fe690e5 -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/analyses" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/analyses"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/analyses</code></p>
<!-- END_2d5379aefd6619ed2d81ae7d6fe690e5 -->
<!-- START_b5de4a887bfc5a2ec783fad55d08afa6 -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/analyses/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/analyses/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/analyses/{analysis}</code></p>
<!-- END_b5de4a887bfc5a2ec783fad55d08afa6 -->
<!-- START_f77e518e91aeb9d0fe771182ed68459b -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/analyses/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/analyses/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/analyses/{analysis}/edit</code></p>
<!-- END_f77e518e91aeb9d0fe771182ed68459b -->
<!-- START_6f3cec263849c8290570132c7c3633e0 -->
<h2>Met à jour les associations entre analyse et anaitem.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/analyses/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/analyses/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/analyses/{analysis}</code></p>
<p><code>PATCH laboratoire/analyses/{analysis}</code></p>
<!-- END_6f3cec263849c8290570132c7c3633e0 -->
<!-- START_19f82ccdd7e2297b359d28b2d2ee8c02 -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/analyses/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/analyses/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/analyses/{analysis}</code></p>
<!-- END_19f82ccdd7e2297b359d28b2d2ee8c02 -->
<!-- START_7037d4950b4af26734b3ae99bb42b50e -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/anaactes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/anaactes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/anaactes</code></p>
<!-- END_7037d4950b4af26734b3ae99bb42b50e -->
<!-- START_e283abb99aed1f2f05db5b2d1de09a83 -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/anaactes/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/anaactes/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/anaactes/create</code></p>
<!-- END_e283abb99aed1f2f05db5b2d1de09a83 -->
<!-- START_e43c8d2365c4ad032a975460cf9867e1 -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/anaactes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/anaactes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/anaactes</code></p>
<!-- END_e43c8d2365c4ad032a975460cf9867e1 -->
<!-- START_0fcc82e847e5b672d92a969c0a6cd4cf -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/anaactes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/anaactes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/anaactes/{anaacte}</code></p>
<!-- END_0fcc82e847e5b672d92a969c0a6cd4cf -->
<!-- START_c083b75ae56f423e8e7f27218b691feb -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/anaactes/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/anaactes/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/anaactes/{anaacte}/edit</code></p>
<!-- END_c083b75ae56f423e8e7f27218b691feb -->
<!-- START_c3e8d59cd7fcb50a025d7dd7a81d2bc1 -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/anaactes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/anaactes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/anaactes/{anaacte}</code></p>
<p><code>PATCH laboratoire/anaactes/{anaacte}</code></p>
<!-- END_c3e8d59cd7fcb50a025d7dd7a81d2bc1 -->
<!-- START_3f69b9bae74a14570a5fba752cf61e45 -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/anaactes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/anaactes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/anaactes/{anaacte}</code></p>
<!-- END_3f69b9bae74a14570a5fba752cf61e45 -->
<!-- START_d822dd1b9cff112ade20b75b89c0e0ce -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/anatypes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/anatypes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/anatypes</code></p>
<!-- END_d822dd1b9cff112ade20b75b89c0e0ce -->
<!-- START_b049821052744e340a1bcc9d6dce057d -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/anatypes/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/anatypes/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/anatypes/create</code></p>
<!-- END_b049821052744e340a1bcc9d6dce057d -->
<!-- START_0f0937b7a951c09240296cfecbedc54a -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/anatypes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/anatypes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/anatypes</code></p>
<!-- END_0f0937b7a951c09240296cfecbedc54a -->
<!-- START_5ccd58f25c675dc87ce76017f04b7f17 -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/anatypes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/anatypes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/anatypes/{anatype}</code></p>
<!-- END_5ccd58f25c675dc87ce76017f04b7f17 -->
<!-- START_ba792c6f723d0014e9b894e99810db74 -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/anatypes/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/anatypes/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/anatypes/{anatype}/edit</code></p>
<!-- END_ba792c6f723d0014e9b894e99810db74 -->
<!-- START_e57978cf07830837fb34c459797b729d -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/anatypes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/anatypes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/anatypes/{anatype}</code></p>
<p><code>PATCH laboratoire/anatypes/{anatype}</code></p>
<!-- END_e57978cf07830837fb34c459797b729d -->
<!-- START_fc2143bbe9a3955032bf5e4dd5ee98d7 -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/anatypes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/anatypes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/anatypes/{anatype}</code></p>
<!-- END_fc2143bbe9a3955032bf5e4dd5ee98d7 -->
<!-- START_5b6f87ac6a1e8ea817e3855bba359b5b -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/anaitems" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/anaitems"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/anaitems</code></p>
<!-- END_5b6f87ac6a1e8ea817e3855bba359b5b -->
<!-- START_f336107cf92c7268f4d40e3d0b3b2825 -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/anaitems/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/anaitems/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/anaitems/create</code></p>
<!-- END_f336107cf92c7268f4d40e3d0b3b2825 -->
<!-- START_d9ee997980b964c659186ccf3afacc4d -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/anaitems" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/anaitems"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/anaitems</code></p>
<!-- END_d9ee997980b964c659186ccf3afacc4d -->
<!-- START_21164067d311adfe8feb36a28fe90785 -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/anaitems/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/anaitems/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/anaitems/{anaitem}</code></p>
<!-- END_21164067d311adfe8feb36a28fe90785 -->
<!-- START_4b1f7f64eaf68a0c3ad0d9e6b4ce9573 -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/anaitems/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/anaitems/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/anaitems/{anaitem}/edit</code></p>
<!-- END_4b1f7f64eaf68a0c3ad0d9e6b4ce9573 -->
<!-- START_a347f1b110a41af381364681a9a10519 -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/anaitems/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/anaitems/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/anaitems/{anaitem}</code></p>
<p><code>PATCH laboratoire/anaitems/{anaitem}</code></p>
<!-- END_a347f1b110a41af381364681a9a10519 -->
<!-- START_7a91ba78a3dc9b2606cbdaa89f405f56 -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/anaitems/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/anaitems/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/anaitems/{anaitem}</code></p>
<!-- END_7a91ba78a3dc9b2606cbdaa89f405f56 -->
<!-- START_b9eb8bf490a00a21a320fed30857b097 -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/unites" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/unites"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/unites</code></p>
<!-- END_b9eb8bf490a00a21a320fed30857b097 -->
<!-- START_654487c5d2e9c73b82e9f4da9d837411 -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/unites/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/unites/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/unites/create</code></p>
<!-- END_654487c5d2e9c73b82e9f4da9d837411 -->
<!-- START_136253e12f028fa91462fdefb1de6cc3 -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/unites" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/unites"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/unites</code></p>
<!-- END_136253e12f028fa91462fdefb1de6cc3 -->
<!-- START_5857fc8691ca19d0b0b0631fd8ac9205 -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/unites/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/unites/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/unites/{unite}</code></p>
<!-- END_5857fc8691ca19d0b0b0631fd8ac9205 -->
<!-- START_d9f4b01adeeec8a4bfc8f9c1445d1b66 -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/unites/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/unites/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/unites/{unite}/edit</code></p>
<!-- END_d9f4b01adeeec8a4bfc8f9c1445d1b66 -->
<!-- START_87b1d269e6a5cb05e4b8f880c3062b40 -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/unites/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/unites/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/unites/{unite}</code></p>
<p><code>PATCH laboratoire/unites/{unite}</code></p>
<!-- END_87b1d269e6a5cb05e4b8f880c3062b40 -->
<!-- START_ab92745bee925afece535f1866f56254 -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/unites/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/unites/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/unites/{unite}</code></p>
<!-- END_ab92745bee925afece535f1866f56254 -->
<!-- START_e50b80e5630193293bdfb971e2a3fae4 -->
<h2>laboratoire/demandes/modif/{demande_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/demandes/modif/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/demandes/modif/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/demandes/modif/{demande_id}</code></p>
<!-- END_e50b80e5630193293bdfb971e2a3fae4 -->
<!-- START_d5f15671d6d5bf06fd53065198f355ed -->
<h2>laboratoire/demandes</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/demandes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/demandes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/demandes</code></p>
<!-- END_d5f15671d6d5bf06fd53065198f355ed -->
<!-- START_40e51556b775cd430744d346efd209f3 -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/demandes/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/demandes/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/demandes/create</code></p>
<!-- END_40e51556b775cd430744d346efd209f3 -->
<!-- START_466b028e392ac9876107c3f32890c86c -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/demandes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/demandes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/demandes</code></p>
<!-- END_466b028e392ac9876107c3f32890c86c -->
<!-- START_6d2d86b2e068369ca541d8645da2c10e -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/demandes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/demandes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/demandes/{demande}</code></p>
<!-- END_6d2d86b2e068369ca541d8645da2c10e -->
<!-- START_5a6cf66f9405d5ec67fab678b0b5f254 -->
<h2>Saisie des résulats d&#039;une analyse</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/demandes/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/demandes/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/demandes/{demande}/edit</code></p>
<!-- END_5a6cf66f9405d5ec67fab678b0b5f254 -->
<!-- START_a7407d51b8df0ee8c7a50138f1289dac -->
<h2>Modifie les caractéristiques d&#039;une demande d&#039;analyse (retour de la fontion modif)</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/demandes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/demandes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/demandes/{demande}</code></p>
<p><code>PATCH laboratoire/demandes/{demande}</code></p>
<!-- END_a7407d51b8df0ee8c7a50138f1289dac -->
<!-- START_417178ea71b625e21bdee0e2f1519425 -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/demandes/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/demandes/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/demandes/{demande}</code></p>
<!-- END_417178ea71b625e21bdee0e2f1519425 -->
<!-- START_73a5dbbe7799ad1575ba9141794a4ff6 -->
<h2>Methode de confirmation de suppression d&#039;un prélévement</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/prelevement/suppr/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/prelevement/suppr/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/prelevement/suppr/{prelevement_id}</code></p>
<!-- END_73a5dbbe7799ad1575ba9141794a4ff6 -->
<!-- START_a5ecc3a979b7fc64aa3d288915e769f7 -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/prelevement" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/prelevement"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/prelevement</code></p>
<!-- END_a5ecc3a979b7fc64aa3d288915e769f7 -->
<!-- START_df51b9183c1acaf310e80582c75c364b -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/prelevement/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/prelevement/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/prelevement/create</code></p>
<!-- END_df51b9183c1acaf310e80582c75c364b -->
<!-- START_231bb544cb7eee9a4c70e2acac909f14 -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/prelevement" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/prelevement"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/prelevement</code></p>
<!-- END_231bb544cb7eee9a4c70e2acac909f14 -->
<!-- START_b3afb484ac1e2c7fe7d6d1e8a607c40a -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/prelevement/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/prelevement/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/prelevement/{prelevement}</code></p>
<!-- END_b3afb484ac1e2c7fe7d6d1e8a607c40a -->
<!-- START_2168c4fd2ebac20873d9c5e57d6663cc -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/prelevement/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/prelevement/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/prelevement/{prelevement}/edit</code></p>
<!-- END_2168c4fd2ebac20873d9c5e57d6663cc -->
<!-- START_bb96d1655aa8a36259fc35b92c3560c2 -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/prelevement/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/prelevement/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/prelevement/{prelevement}</code></p>
<p><code>PATCH laboratoire/prelevement/{prelevement}</code></p>
<!-- END_bb96d1655aa8a36259fc35b92c3560c2 -->
<!-- START_9be9a5aa51f48712c59563027422d45d -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/prelevement/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/prelevement/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/prelevement/{prelevement}</code></p>
<!-- END_9be9a5aa51f48712c59563027422d45d -->
<!-- START_022dccc5ab5c68fc64ace78851d23cfd -->
<h2>Montre le formulaire pour renseigner 1 seul prélèvement d&#039;une demande</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/prelevement/createOne/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/prelevement/createOne/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/prelevement/createOne/{demande_id}/{rang}</code></p>
<!-- END_022dccc5ab5c68fc64ace78851d23cfd -->
<!-- START_acf08baf996969ea63dcc70b38a252d4 -->
<h2>Montre le formulaire pour renseigner TOUS les prélèvements d&#039;une demande</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/prelevement/createOnDemande/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/prelevement/createOnDemande/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/prelevement/createOnDemande/{demande_id}</code></p>
<!-- END_acf08baf996969ea63dcc70b38a252d4 -->
<!-- START_a9065301801959bf2607f62d1e1567af -->
<h2>Enregistre les données d&#039;un SEUL prélèvement d&#039;une demande (prélèvement non encore renseigné)</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/prelevement/storeOne" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/prelevement/storeOne"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/prelevement/storeOne</code></p>
<!-- END_a9065301801959bf2607f62d1e1567af -->
<!-- START_bf8ff567d28f183e890688df659b9d4e -->
<h2>Enregistre les données de l&#039;ensemble des prélèvements d&#039;une demande</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/prelevement/storeOnDemande" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/prelevement/storeOnDemande"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/prelevement/storeOnDemande</code></p>
<!-- END_bf8ff567d28f183e890688df659b9d4e -->
<!-- START_04948c9865640a02157e52c28a068901 -->
<h2>laboratoire/demandes/{demande_id}/paillasse</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/demandes/1/paillasse" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/demandes/1/paillasse"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/demandes/{demande_id}/paillasse</code></p>
<!-- END_04948c9865640a02157e52c28a068901 -->
<!-- START_82aa54504012caeae52633872d57bddc -->
<h2>laboratoire/signer/{demande_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/signer/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/signer/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/signer/{demande_id}</code></p>
<!-- END_82aa54504012caeae52633872d57bddc -->
<!-- START_c6a54468d3ab2176f85d9e68928b1f38 -->
<h2>laboratoire/envoyer/{destinataire_id}/{demande_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/envoyer/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/envoyer/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/envoyer/{destinataire_id}/{demande_id}</code></p>
<!-- END_c6a54468d3ab2176f85d9e68928b1f38 -->
<!-- START_56320a1ba117626df9648186ebc477ba -->
<h2>laboratoire/envoyer_facture/{facture_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/envoyer_facture/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/envoyer_facture/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/envoyer_facture/{facture_id}</code></p>
<!-- END_56320a1ba117626df9648186ebc477ba -->
<!-- START_373bd881f0d3b0ce1d74a407431be8cd -->
<h2>laboratoire/envoyer_tous/{destinataire_id}/{demande_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/envoyer_tous/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/envoyer_tous/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/envoyer_tous/{destinataire_id}/{demande_id}</code></p>
<!-- END_373bd881f0d3b0ce1d74a407431be8cd -->
<!-- START_11a8920f408c9a6c14b32451f2e55fb3 -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/user</code></p>
<!-- END_11a8920f408c9a6c14b32451f2e55fb3 -->
<!-- START_d894876bbfcaa3287d22f41b1de8b5e1 -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/user/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/user/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/user/create</code></p>
<!-- END_d894876bbfcaa3287d22f41b1de8b5e1 -->
<!-- START_c63e7019c6eb66bb41002081d4b5a863 -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/user</code></p>
<!-- END_c63e7019c6eb66bb41002081d4b5a863 -->
<!-- START_d6bdc7afb2472e381243961b40765eb1 -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/user/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/user/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/user/{user}</code></p>
<!-- END_d6bdc7afb2472e381243961b40765eb1 -->
<!-- START_2c33e26cec35e7ebe06008df5de1c036 -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/user/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/user/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/user/{user}/edit</code></p>
<!-- END_2c33e26cec35e7ebe06008df5de1c036 -->
<!-- START_2b2767f4e24868a17351df10918ebc5b -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/user/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/user/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/user/{user}</code></p>
<p><code>PATCH laboratoire/user/{user}</code></p>
<!-- END_2b2767f4e24868a17351df10918ebc5b -->
<!-- START_3d3a647c557f150912beddb02ebfe213 -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/user/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/user/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/user/{user}</code></p>
<!-- END_3d3a647c557f150912beddb02ebfe213 -->
<!-- START_c824369c59c873c2a8bef718726e20c0 -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/laboAdmin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/laboAdmin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/laboAdmin</code></p>
<!-- END_c824369c59c873c2a8bef718726e20c0 -->
<!-- START_e0ca604c43661d932d9e08c88bf33b27 -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/laboAdmin/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/laboAdmin/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/laboAdmin/create</code></p>
<!-- END_e0ca604c43661d932d9e08c88bf33b27 -->
<!-- START_fedf7b8960cbb4ab3e3187a5bf27ff4d -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/laboAdmin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/laboAdmin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/laboAdmin</code></p>
<!-- END_fedf7b8960cbb4ab3e3187a5bf27ff4d -->
<!-- START_e402db6d8b571e54599b6ffb1a6b873d -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/laboAdmin/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/laboAdmin/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/laboAdmin/{laboAdmin}</code></p>
<!-- END_e402db6d8b571e54599b6ffb1a6b873d -->
<!-- START_68a4b4226f47a7a21bac0a734a0d8b2f -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/laboAdmin/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/laboAdmin/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/laboAdmin/{laboAdmin}/edit</code></p>
<!-- END_68a4b4226f47a7a21bac0a734a0d8b2f -->
<!-- START_047c9beb8374f4bb59d637117c668f57 -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/laboAdmin/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/laboAdmin/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/laboAdmin/{laboAdmin}</code></p>
<p><code>PATCH laboratoire/laboAdmin/{laboAdmin}</code></p>
<!-- END_047c9beb8374f4bb59d637117c668f57 -->
<!-- START_e0053bdceb38868f1ae2f607cc8dd6cf -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/laboAdmin/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/laboAdmin/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/laboAdmin/{laboAdmin}</code></p>
<!-- END_e0053bdceb38868f1ae2f607cc8dd6cf -->
<!-- START_322ce14766191f26ba35a9bf89e7ce1e -->
<h2>laboratoire/vetoAdmin/createOnDemande</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/vetoAdmin/createOnDemande" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/vetoAdmin/createOnDemande"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/vetoAdmin/createOnDemande</code></p>
<!-- END_322ce14766191f26ba35a9bf89e7ce1e -->
<!-- START_622bc6e3888e0e6897128544a1e0768d -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/vetoAdmin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/vetoAdmin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/vetoAdmin</code></p>
<!-- END_622bc6e3888e0e6897128544a1e0768d -->
<!-- START_75184b772e837bcc8bcce4864c115fec -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/vetoAdmin/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/vetoAdmin/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/vetoAdmin/create</code></p>
<!-- END_75184b772e837bcc8bcce4864c115fec -->
<!-- START_21382d8711122d08875a059bf5f0edb7 -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/vetoAdmin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/vetoAdmin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/vetoAdmin</code></p>
<!-- END_21382d8711122d08875a059bf5f0edb7 -->
<!-- START_650dd09422f586b42d763b239071e3af -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/vetoAdmin/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/vetoAdmin/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/vetoAdmin/{vetoAdmin}</code></p>
<!-- END_650dd09422f586b42d763b239071e3af -->
<!-- START_74f4c9d1aa477b7e2d702b6f0112560c -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/vetoAdmin/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/vetoAdmin/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/vetoAdmin/{vetoAdmin}/edit</code></p>
<!-- END_74f4c9d1aa477b7e2d702b6f0112560c -->
<!-- START_f97405a88fd758725301cc4d3c39aaed -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/vetoAdmin/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/vetoAdmin/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/vetoAdmin/{vetoAdmin}</code></p>
<p><code>PATCH laboratoire/vetoAdmin/{vetoAdmin}</code></p>
<!-- END_f97405a88fd758725301cc4d3c39aaed -->
<!-- START_c602c040a12e6f0570deb21ad9eac2e2 -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/vetoAdmin/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/vetoAdmin/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/vetoAdmin/{vetoAdmin}</code></p>
<!-- END_c602c040a12e6f0570deb21ad9eac2e2 -->
<!-- START_d398fb13a0fe6bbf0df4b7a383fb8b76 -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/eleveurAdmin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/eleveurAdmin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/eleveurAdmin</code></p>
<!-- END_d398fb13a0fe6bbf0df4b7a383fb8b76 -->
<!-- START_6db0bb7b77705c89f2f8c8b527489943 -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/eleveurAdmin/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/eleveurAdmin/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/eleveurAdmin/create</code></p>
<!-- END_6db0bb7b77705c89f2f8c8b527489943 -->
<!-- START_b561bc8f2ace1b97ca33419e1c8682e3 -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/eleveurAdmin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/eleveurAdmin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/eleveurAdmin</code></p>
<!-- END_b561bc8f2ace1b97ca33419e1c8682e3 -->
<!-- START_4db401204ffb3b620ba7c0846f41f50a -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/eleveurAdmin/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/eleveurAdmin/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/eleveurAdmin/{eleveurAdmin}</code></p>
<!-- END_4db401204ffb3b620ba7c0846f41f50a -->
<!-- START_3ef3eb6e24f8e6a8c166164969922fa5 -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/eleveurAdmin/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/eleveurAdmin/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/eleveurAdmin/{eleveurAdmin}/edit</code></p>
<!-- END_3ef3eb6e24f8e6a8c166164969922fa5 -->
<!-- START_cb171980f7c9253b59bf8f426e589270 -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/eleveurAdmin/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/eleveurAdmin/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/eleveurAdmin/{eleveurAdmin}</code></p>
<p><code>PATCH laboratoire/eleveurAdmin/{eleveurAdmin}</code></p>
<!-- END_cb171980f7c9253b59bf8f426e589270 -->
<!-- START_3944a5cdd449172c719d693ccc679c1d -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/eleveurAdmin/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/eleveurAdmin/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/eleveurAdmin/{eleveurAdmin}</code></p>
<!-- END_3944a5cdd449172c719d693ccc679c1d -->
<!-- START_3309ab302b3b87982e684a326593d49d -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/troupeau" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/troupeau"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/troupeau</code></p>
<!-- END_3309ab302b3b87982e684a326593d49d -->
<!-- START_821763f7efe92baec35ae938792a1eba -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/troupeau/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/troupeau/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/troupeau/create</code></p>
<!-- END_821763f7efe92baec35ae938792a1eba -->
<!-- START_339c9b1edf1d860d49bca6753b0c8fe4 -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/troupeau" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/troupeau"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/troupeau</code></p>
<!-- END_339c9b1edf1d860d49bca6753b0c8fe4 -->
<!-- START_3db2daf7ad6757ad0ba2f26506c148de -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/troupeau/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/troupeau/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/troupeau/{troupeau}</code></p>
<!-- END_3db2daf7ad6757ad0ba2f26506c148de -->
<!-- START_73b631840f6b64f7ac16bcaa7cf78031 -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/troupeau/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/troupeau/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/troupeau/{troupeau}/edit</code></p>
<!-- END_73b631840f6b64f7ac16bcaa7cf78031 -->
<!-- START_cf8a2f67529359c75224bd30e5ac6f4b -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/troupeau/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/troupeau/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/troupeau/{troupeau}</code></p>
<p><code>PATCH laboratoire/troupeau/{troupeau}</code></p>
<!-- END_cf8a2f67529359c75224bd30e5ac6f4b -->
<!-- START_58a2f9c58eee2abf4a51b9108f0c55f1 -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/troupeau/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/troupeau/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/troupeau/{troupeau}</code></p>
<!-- END_58a2f9c58eee2abf4a51b9108f0c55f1 -->
<!-- START_fb6859ea19eed79b016ec5bcf869aa72 -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/animal" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/animal"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/animal</code></p>
<!-- END_fb6859ea19eed79b016ec5bcf869aa72 -->
<!-- START_e0f84d1c01a75f84616a4d8599c140e0 -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/animal/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/animal/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/animal/create</code></p>
<!-- END_e0f84d1c01a75f84616a4d8599c140e0 -->
<!-- START_9be73347df87c6d8acb4fd7548e1479a -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/animal" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/animal"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/animal</code></p>
<!-- END_9be73347df87c6d8acb4fd7548e1479a -->
<!-- START_9deb3fffbe1a6307e3ffa1eb06c81caf -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/animal/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/animal/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/animal/{animal}</code></p>
<!-- END_9deb3fffbe1a6307e3ffa1eb06c81caf -->
<!-- START_0526f31f48616835f940b41c64802cac -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/animal/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/animal/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/animal/{animal}/edit</code></p>
<!-- END_0526f31f48616835f940b41c64802cac -->
<!-- START_86d1f528b4cdafe3fd36679f000897db -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/animal/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/animal/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/animal/{animal}</code></p>
<p><code>PATCH laboratoire/animal/{animal}</code></p>
<!-- END_86d1f528b4cdafe3fd36679f000897db -->
<!-- START_2b6f0a886c763a5383e0308143e03435 -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/animal/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/animal/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/animal/{animal}</code></p>
<!-- END_2b6f0a886c763a5383e0308143e03435 -->
<!-- START_2d400b00c8dfb9fe679c2a6f66ae6acc -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/typeprod" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/typeprod"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/typeprod</code></p>
<!-- END_2d400b00c8dfb9fe679c2a6f66ae6acc -->
<!-- START_3d7de4fe212570491f0b13009f05fdaf -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/typeprod/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/typeprod/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/typeprod/create</code></p>
<!-- END_3d7de4fe212570491f0b13009f05fdaf -->
<!-- START_a40d998260349eb599151a494b4aa79b -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/typeprod" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/typeprod"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/typeprod</code></p>
<!-- END_a40d998260349eb599151a494b4aa79b -->
<!-- START_214c81b217651c60d7befd152a361ce1 -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/typeprod/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/typeprod/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/typeprod/{typeprod}</code></p>
<!-- END_214c81b217651c60d7befd152a361ce1 -->
<!-- START_abc366d2f560ac3e09eaf514e58fcc5b -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/typeprod/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/typeprod/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/typeprod/{typeprod}/edit</code></p>
<!-- END_abc366d2f560ac3e09eaf514e58fcc5b -->
<!-- START_e76749ca9965ad32d5bc01af536f387c -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/typeprod/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/typeprod/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/typeprod/{typeprod}</code></p>
<p><code>PATCH laboratoire/typeprod/{typeprod}</code></p>
<!-- END_e76749ca9965ad32d5bc01af536f387c -->
<!-- START_f5d40c4ee438e8673b5a34313a947adf -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/typeprod/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/typeprod/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/typeprod/{typeprod}</code></p>
<!-- END_f5d40c4ee438e8673b5a34313a947adf -->
<!-- START_1bee8be62633ce0f1b0c51ab403edc85 -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/serie" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/serie"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/serie</code></p>
<!-- END_1bee8be62633ce0f1b0c51ab403edc85 -->
<!-- START_5b9c4075cf30f2e35c42c69d21d08b98 -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/serie/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/serie/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/serie/create</code></p>
<!-- END_5b9c4075cf30f2e35c42c69d21d08b98 -->
<!-- START_258411b1bcea1fcd0ab858293afc4923 -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/serie" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/serie"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/serie</code></p>
<!-- END_258411b1bcea1fcd0ab858293afc4923 -->
<!-- START_77c8af0ece50ce2a3c3a03a21bf071ca -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/serie/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/serie/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/serie/{serie}</code></p>
<!-- END_77c8af0ece50ce2a3c3a03a21bf071ca -->
<!-- START_223de69c8e2d8f6cadfb0c7091eeb31f -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/serie/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/serie/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/serie/{serie}/edit</code></p>
<!-- END_223de69c8e2d8f6cadfb0c7091eeb31f -->
<!-- START_16d81c494eb623136bf19379504c68e5 -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/serie/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/serie/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/serie/{serie}</code></p>
<p><code>PATCH laboratoire/serie/{serie}</code></p>
<!-- END_16d81c494eb623136bf19379504c68e5 -->
<!-- START_e9e5840e96568accf5c51c6a94e82fbf -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/serie/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/serie/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/serie/{serie}</code></p>
<!-- END_e9e5840e96568accf5c51c6a94e82fbf -->
<!-- START_3c14003fb8c51661672180a0b262dfdd -->
<h2>laboratoire/usertypes</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/usertypes" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/usertypes"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/usertypes</code></p>
<!-- END_3c14003fb8c51661672180a0b262dfdd -->
<!-- START_61ed6c7b9cfddc67cf6e27e210c2f5de -->
<h2>laboratoire/resultats/cloture/{demande_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/resultats/cloture/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/resultats/cloture/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/resultats/cloture/{demande_id}</code></p>
<!-- END_61ed6c7b9cfddc67cf6e27e210c2f5de -->
<!-- START_3999be3960568a87c33cc8b48d934076 -->
<h2>laboratoire/resultats/rouvrir/{demande_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/resultats/rouvrir/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/resultats/rouvrir/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/resultats/rouvrir/{demande_id}</code></p>
<!-- END_3999be3960568a87c33cc8b48d934076 -->
<!-- START_978ffac207655d4cd7619567fc6a769a -->
<h2>laboratoire/pythie/{commentaire_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/pythie/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/pythie/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/pythie/{commentaire_id}</code></p>
<!-- END_978ffac207655d4cd7619567fc6a769a -->
<!-- START_86ca4440806f9696e1fecbab94fcfa78 -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/commentaire" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/commentaire"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/commentaire</code></p>
<!-- END_86ca4440806f9696e1fecbab94fcfa78 -->
<!-- START_bd6e58176e262597c71133491755980c -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/commentaire/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/commentaire/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/commentaire/create</code></p>
<!-- END_bd6e58176e262597c71133491755980c -->
<!-- START_31383b03e4373b23befd39255406f543 -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/commentaire" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/commentaire"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/commentaire</code></p>
<!-- END_31383b03e4373b23befd39255406f543 -->
<!-- START_229833da670941554384a6a2b5efc08d -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/commentaire/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/commentaire/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/commentaire/{commentaire}</code></p>
<!-- END_229833da670941554384a6a2b5efc08d -->
<!-- START_2e7448e705846357c620bb86948e031b -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/commentaire/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/commentaire/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/commentaire/{commentaire}/edit</code></p>
<!-- END_2e7448e705846357c620bb86948e031b -->
<!-- START_999121203e900caf672a33f1596a6be9 -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/commentaire/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/commentaire/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/commentaire/{commentaire}</code></p>
<p><code>PATCH laboratoire/commentaire/{commentaire}</code></p>
<!-- END_999121203e900caf672a33f1596a6be9 -->
<!-- START_c297901c7887fde0cf9a72b1ff43e351 -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/commentaire/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/commentaire/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/commentaire/{commentaire}</code></p>
<!-- END_c297901c7887fde0cf9a72b1ff43e351 -->
<!-- START_1c03f28982b2f42b5ac7b5b2c9af3915 -->
<h2>laboratoire/resultats</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/resultats" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/resultats"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/resultats</code></p>
<!-- END_1c03f28982b2f42b5ac7b5b2c9af3915 -->
<!-- START_45751a556e545734d24c105548eeb8c8 -->
<h2>laboratoire/resultats</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/resultats" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/resultats"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/resultats</code></p>
<!-- END_45751a556e545734d24c105548eeb8c8 -->
<!-- START_83cd7d8aa8d34136e78c3004108d9e6c -->
<h2>laboratoire/resultats/{resultat}/edit</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/resultats/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/resultats/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/resultats/{resultat}/edit</code></p>
<!-- END_83cd7d8aa8d34136e78c3004108d9e6c -->
<!-- START_f69ea70a10e1e139ee8755b8dc0046ca -->
<h2>laboratoire/resultatPdf/labo/{demande_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/resultatPdf/labo/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/resultatPdf/labo/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/resultatPdf/labo/{demande_id}</code></p>
<!-- END_f69ea70a10e1e139ee8755b8dc0046ca -->
<!-- START_1897fff3fb35753ae1b83076cb3ddb74 -->
<h2>Fonction pour créer une facture après avoir choisi le destinataire</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/factures/create/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/factures/create/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/factures/create/{destinataire_id}</code></p>
<!-- END_1897fff3fb35753ae1b83076cb3ddb74 -->
<!-- START_0606dafdeed6be0f5d6918627b8c30c5 -->
<h2>Fonction pour créer une facture après avoir choisi le destinataire et la demande</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/factures/create/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/factures/create/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/factures/create/{destinataire_id}/{demande_id}</code></p>
<!-- END_0606dafdeed6be0f5d6918627b8c30c5 -->
<!-- START_473aaffd3b8957d7a0dbbd64539824a1 -->
<h2>Fonction pour lister les factures à établir</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/factures/etablir" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/factures/etablir"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/factures/etablir</code></p>
<!-- END_473aaffd3b8957d7a0dbbd64539824a1 -->
<!-- START_acf4f3f824143bf9318ccef39f57fc2b -->
<h2>laboratoire/facture/paiement</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/facture/paiement" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/facture/paiement"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/facture/paiement</code></p>
<!-- END_acf4f3f824143bf9318ccef39f57fc2b -->
<!-- START_3bef32273409297f0c984f462a5772ce -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/factures" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/factures"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/factures</code></p>
<!-- END_3bef32273409297f0c984f462a5772ce -->
<!-- START_6cf04f69c9ec5746164ca8f3e31de420 -->
<h2>Non utilisé à cause de la spéficité de l&#039;établissement d&#039;une facture: la création d&#039;une facture dépend toujours d&#039;un utilisateur</h2>
<p>Il s&#039;agit donc de la fonction etablir ou createFromUser</p>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/factures/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/factures/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/factures/create</code></p>
<!-- END_6cf04f69c9ec5746164ca8f3e31de420 -->
<!-- START_cdf896f12f9cc8793b16cdfd23680b01 -->
<h2>Fonction appelée par la vue factureAEtablir issue de FactureController@etablir</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/factures" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/factures"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/factures</code></p>
<!-- END_cdf896f12f9cc8793b16cdfd23680b01 -->
<!-- START_01073e0d6d17ceb885ecc05d3bf106fe -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/factures/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/factures/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/factures/{facture}</code></p>
<!-- END_01073e0d6d17ceb885ecc05d3bf106fe -->
<!-- START_30a8dfdc2febaad432b4e870bfc641fc -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/factures/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/factures/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/factures/{facture}/edit</code></p>
<!-- END_30a8dfdc2febaad432b4e870bfc641fc -->
<!-- START_72eef0f8f6c0768bdc4d9a18e1b8d78e -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/factures/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/factures/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/factures/{facture}</code></p>
<p><code>PATCH laboratoire/factures/{facture}</code></p>
<!-- END_72eef0f8f6c0768bdc4d9a18e1b8d78e -->
<!-- START_7aa56a0ed35ecd0c35a7681fb1671cb7 -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/factures/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/factures/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/factures/{facture}</code></p>
<!-- END_7aa56a0ed35ecd0c35a7681fb1671cb7 -->
<!-- START_32eaf1b4b28bd8b4d094edd19074559a -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/reglement" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/reglement"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/reglement</code></p>
<!-- END_32eaf1b4b28bd8b4d094edd19074559a -->
<!-- START_4c3f4151276b0f36f0f14bffcd9ff418 -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/reglement/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/reglement/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/reglement/create</code></p>
<!-- END_4c3f4151276b0f36f0f14bffcd9ff418 -->
<!-- START_5582de72b9a4d2a167519f426dfe5eed -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/reglement" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/reglement"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/reglement</code></p>
<!-- END_5582de72b9a4d2a167519f426dfe5eed -->
<!-- START_8db91fd699c1f0158025fc277a320a75 -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/reglement/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/reglement/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/reglement/{reglement}</code></p>
<!-- END_8db91fd699c1f0158025fc277a320a75 -->
<!-- START_88db6ecdda22d9405a85fea61b7d4273 -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/reglement/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/reglement/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/reglement/{reglement}/edit</code></p>
<!-- END_88db6ecdda22d9405a85fea61b7d4273 -->
<!-- START_37bc0672e3b97145cdab77334cdbb4ac -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/reglement/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/reglement/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/reglement/{reglement}</code></p>
<p><code>PATCH laboratoire/reglement/{reglement}</code></p>
<!-- END_37bc0672e3b97145cdab77334cdbb4ac -->
<!-- START_d90acfdd0101eb77a70b313f8c2c711a -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/reglement/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/reglement/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/reglement/{reglement}</code></p>
<!-- END_d90acfdd0101eb77a70b313f8c2c711a -->
<!-- START_a17a33be7b276ef675c013469b74ac14 -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/acte" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/acte"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/acte</code></p>
<!-- END_a17a33be7b276ef675c013469b74ac14 -->
<!-- START_eb6bc63cf8e7caa1e532406d8f5e5c1c -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/acte/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/acte/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/acte/create</code></p>
<!-- END_eb6bc63cf8e7caa1e532406d8f5e5c1c -->
<!-- START_e5a06511a55b48ef01c01ce74109e9c7 -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/acte" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/acte"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/acte</code></p>
<!-- END_e5a06511a55b48ef01c01ce74109e9c7 -->
<!-- START_88a6e86a3cde233b4f4d8c14942c76c0 -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/acte/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/acte/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/acte/{acte}</code></p>
<!-- END_88a6e86a3cde233b4f4d8c14942c76c0 -->
<!-- START_0d4925bf14bfdf692890bdbf8cd14617 -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/acte/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/acte/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (401):</p>
</blockquote>
<pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/acte/{acte}/edit</code></p>
<!-- END_0d4925bf14bfdf692890bdbf8cd14617 -->
<!-- START_d7f9563f26e5c4cd80e4fa18f383c706 -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/acte/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/acte/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/acte/{acte}</code></p>
<p><code>PATCH laboratoire/acte/{acte}</code></p>
<!-- END_d7f9563f26e5c4cd80e4fa18f383c706 -->
<!-- START_adfdcedb3cd9bd545f434fe4ff16f13b -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/acte/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/acte/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/acte/{acte}</code></p>
<!-- END_adfdcedb3cd9bd545f434fe4ff16f13b -->
<!-- START_20dc46ed5fcf705a738b539b80703c3a -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/blog/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/blog/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/blog/create</code></p>
<!-- END_20dc46ed5fcf705a738b539b80703c3a -->
<!-- START_0bdb77d64e7fc1fd6b1b1a39ea80ad3b -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/blog" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/blog"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/blog</code></p>
<!-- END_0bdb77d64e7fc1fd6b1b1a39ea80ad3b -->
<!-- START_77b659fb10c2b54437c75c2a4dbf5920 -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/blog/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/blog/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/blog/{blog}/edit</code></p>
<!-- END_77b659fb10c2b54437c75c2a4dbf5920 -->
<!-- START_c9d58eb1d29588d4b5edd8b696639ff8 -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/blog/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/blog/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/blog/{blog}</code></p>
<p><code>PATCH laboratoire/blog/{blog}</code></p>
<!-- END_c9d58eb1d29588d4b5edd8b696639ff8 -->
<!-- START_707bd6f5b4f58923c285638f87e2e8be -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/blog/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/blog/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/blog/{blog}</code></p>
<!-- END_707bd6f5b4f58923c285638f87e2e8be -->
<!-- START_65b44959056ce919144919cd14199b07 -->
<h2>laboratoire/traductions</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/traductions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/traductions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/traductions</code></p>
<!-- END_65b44959056ce919144919cd14199b07 -->
<!-- START_1edfe22d86b16e6b0410db3a4cd5ddaf -->
<h2>affiche la liste des icone pour suppression en cliquant dessus</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/icones/suppression" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/icones/suppression"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/icones/suppression</code></p>
<!-- END_1edfe22d86b16e6b0410db3a4cd5ddaf -->
<!-- START_6ea8e6e2f61524ec7f43016a2ff27045 -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/icones" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/icones"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/icones</code></p>
<!-- END_6ea8e6e2f61524ec7f43016a2ff27045 -->
<!-- START_e5cc2bcf60542d1b668938e902792e73 -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/icones/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/icones/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/icones/create</code></p>
<!-- END_e5cc2bcf60542d1b668938e902792e73 -->
<!-- START_ec9326f27bbb7155fcb2a5c836b36fc7 -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/icones" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/icones"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/icones</code></p>
<!-- END_ec9326f27bbb7155fcb2a5c836b36fc7 -->
<!-- START_ccab5d4e678859976fb7c4c13be5b5a7 -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/icones/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/icones/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/icones/{icone}</code></p>
<!-- END_ccab5d4e678859976fb7c4c13be5b5a7 -->
<!-- START_3fa0f174394f4ab2f39525891b7c798e -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/icones/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/icones/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/icones/{icone}/edit</code></p>
<!-- END_3fa0f174394f4ab2f39525891b7c798e -->
<!-- START_0b7b679f474fb3172e79a09338202ee5 -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/icones/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/icones/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/icones/{icone}</code></p>
<p><code>PATCH laboratoire/icones/{icone}</code></p>
<!-- END_0b7b679f474fb3172e79a09338202ee5 -->
<!-- START_4a231287b9fbce62439068badcb64b3c -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/icones/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/icones/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/icones/{icone}</code></p>
<!-- END_4a231287b9fbce62439068badcb64b3c -->
<!-- START_9a2f58ff801cc99109c77adc65f77877 -->
<h2>laboratoire/algorithme</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme</code></p>
<!-- END_9a2f58ff801cc99109c77adc65f77877 -->
<!-- START_a54c77389ee9a9c35c6238b64f3c23b4 -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/observations" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/observations"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/observations</code></p>
<!-- END_a54c77389ee9a9c35c6238b64f3c23b4 -->
<!-- START_de6179642db258977b34c08d00d56b22 -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/observations/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/observations/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/observations/create</code></p>
<!-- END_de6179642db258977b34c08d00d56b22 -->
<!-- START_7acd3b1cb9632a1f71a8a08598418ac8 -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/algorithme/observations" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/observations"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/algorithme/observations</code></p>
<!-- END_7acd3b1cb9632a1f71a8a08598418ac8 -->
<!-- START_e0f2acc98d5ccb578095613f459878d2 -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/observations/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/observations/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/observations/{observation}</code></p>
<!-- END_e0f2acc98d5ccb578095613f459878d2 -->
<!-- START_4664109b6c8165cc1b3eda4fcdcf7a55 -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/observations/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/observations/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/observations/{observation}/edit</code></p>
<!-- END_4664109b6c8165cc1b3eda4fcdcf7a55 -->
<!-- START_117878d03b5848f557a62abbbe9e12ce -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/algorithme/observations/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/observations/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/algorithme/observations/{observation}</code></p>
<p><code>PATCH laboratoire/algorithme/observations/{observation}</code></p>
<!-- END_117878d03b5848f557a62abbbe9e12ce -->
<!-- START_73cacb52c07f70286543ad3c7ec5e2c1 -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/algorithme/observations/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/observations/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/algorithme/observations/{observation}</code></p>
<!-- END_73cacb52c07f70286543ad3c7ec5e2c1 -->
<!-- START_552615f55817a040175a20e891e63345 -->
<h2>laboratoire/algorithme/observations/age/{age_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/observations/age/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/observations/age/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/observations/age/{age_id}</code></p>
<!-- END_552615f55817a040175a20e891e63345 -->
<!-- START_557ff69363559dd76a87039f8363c733 -->
<h2>laboratoire/algorithme/observations/espece/{espece_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/observations/espece/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/observations/espece/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/observations/espece/{espece_id}</code></p>
<!-- END_557ff69363559dd76a87039f8363c733 -->
<!-- START_ff01c1f8ac846a0beb0d92d25481a1ef -->
<h2>laboratoire/algorithme/observations/age/{age_id}/{observation_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/observations/age/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/observations/age/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/observations/age/{age_id}/{observation_id}</code></p>
<!-- END_ff01c1f8ac846a0beb0d92d25481a1ef -->
<!-- START_11fe150a36b78b44bb8097481f45470e -->
<h2>laboratoire/algorithme/observations/espece/{espece_id}/{observation_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/observations/espece/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/observations/espece/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/observations/espece/{espece_id}/{observation_id}</code></p>
<!-- END_11fe150a36b78b44bb8097481f45470e -->
<!-- START_5578e70ab6b502ec158d190678b25fd1 -->
<h2>modifie l&#039;association d&#039;une observation à une espece ou a un age</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/observation/animal/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/observation/animal/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/observation/animal/{observation_id}</code></p>
<!-- END_5578e70ab6b502ec158d190678b25fd1 -->
<!-- START_214f18952c84464a6ec7e98ab8779bbb -->
<h2>Modification des associations entre observation et anatype</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/observation/anatype/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/observation/anatype/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/observation/anatype/{observation_id}</code></p>
<!-- END_214f18952c84464a6ec7e98ab8779bbb -->
<!-- START_c7b1a191f6203205ac83b5dbb167b486 -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/options" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/options"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/options</code></p>
<!-- END_c7b1a191f6203205ac83b5dbb167b486 -->
<!-- START_1fc305badc9a07fd24e4c0a00e2378ea -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/options/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/options/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/options/create</code></p>
<!-- END_1fc305badc9a07fd24e4c0a00e2378ea -->
<!-- START_790395bd1ebfe001e2f0c6033625fcc5 -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/algorithme/options" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/options"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/algorithme/options</code></p>
<!-- END_790395bd1ebfe001e2f0c6033625fcc5 -->
<!-- START_29ee279f6e11b7e10b38c334770b9227 -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/options/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/options/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/options/{option}</code></p>
<!-- END_29ee279f6e11b7e10b38c334770b9227 -->
<!-- START_10f67f6ba188631e5c4997baf3d2198b -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/options/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/options/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/options/{option}/edit</code></p>
<!-- END_10f67f6ba188631e5c4997baf3d2198b -->
<!-- START_6ccf4cd10e3b3e676aa6beb7c32e9f7b -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/algorithme/options/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/options/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/algorithme/options/{option}</code></p>
<p><code>PATCH laboratoire/algorithme/options/{option}</code></p>
<!-- END_6ccf4cd10e3b3e676aa6beb7c32e9f7b -->
<!-- START_8c9dd95530fab0b1a2706519fe631f8c -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/algorithme/options/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/options/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/algorithme/options/{option}</code></p>
<!-- END_8c9dd95530fab0b1a2706519fe631f8c -->
<!-- START_882088e1a4a5667612f463c5d1203078 -->
<h2>laboratoire/algorithme/analyses/age/{age_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/analyses/age/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/analyses/age/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/analyses/age/{age_id}</code></p>
<!-- END_882088e1a4a5667612f463c5d1203078 -->
<!-- START_639761ecdfd14db52ac58c02de262310 -->
<h2>laboratoire/algorithme/analyses/espece/{espece_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/analyses/espece/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/analyses/espece/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/analyses/espece/{espece_id}</code></p>
<!-- END_639761ecdfd14db52ac58c02de262310 -->
<!-- START_917f00bc5089dde21500ab75a66eb000 -->
<h2>Modification des associations entre anaacte et espece ou age</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/algorithme/analyses/animal/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/analyses/animal/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/algorithme/analyses/animal/{id}</code></p>
<!-- END_917f00bc5089dde21500ab75a66eb000 -->
<!-- START_211386f183c41f5675deef1910beca77 -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/agesAlgo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/agesAlgo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/agesAlgo</code></p>
<!-- END_211386f183c41f5675deef1910beca77 -->
<!-- START_c35183bedeb7558b847a39174d541a2a -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/agesAlgo/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/agesAlgo/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/agesAlgo/create</code></p>
<!-- END_c35183bedeb7558b847a39174d541a2a -->
<!-- START_05ae359808032894674ccc2fbbbc7b44 -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/algorithme/agesAlgo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/agesAlgo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/algorithme/agesAlgo</code></p>
<!-- END_05ae359808032894674ccc2fbbbc7b44 -->
<!-- START_46eabdb145c34a758bbb5378697ba41a -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/agesAlgo/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/agesAlgo/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/agesAlgo/{agesAlgo}</code></p>
<!-- END_46eabdb145c34a758bbb5378697ba41a -->
<!-- START_66de7e801525ff37127e47e9bf5d4826 -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/agesAlgo/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/agesAlgo/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/agesAlgo/{agesAlgo}/edit</code></p>
<!-- END_66de7e801525ff37127e47e9bf5d4826 -->
<!-- START_b484ae238f511da73755e550a8ec7d37 -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/algorithme/agesAlgo/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/agesAlgo/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/algorithme/agesAlgo/{agesAlgo}</code></p>
<p><code>PATCH laboratoire/algorithme/agesAlgo/{agesAlgo}</code></p>
<!-- END_b484ae238f511da73755e550a8ec7d37 -->
<!-- START_6e64378007bf946e2ab9824dd428d02e -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/algorithme/agesAlgo/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/agesAlgo/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/algorithme/agesAlgo/{agesAlgo}</code></p>
<!-- END_6e64378007bf946e2ab9824dd428d02e -->
<!-- START_1723a74838685828c0151cbb4e81378b -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/especesAlgo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/especesAlgo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/especesAlgo</code></p>
<!-- END_1723a74838685828c0151cbb4e81378b -->
<!-- START_04f307116769f1f9728e558eec6bb94b -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/especesAlgo/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/especesAlgo/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/especesAlgo/create</code></p>
<!-- END_04f307116769f1f9728e558eec6bb94b -->
<!-- START_96bfc4b111af6ebb99a04da1f1d0ddbc -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/algorithme/especesAlgo" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/especesAlgo"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/algorithme/especesAlgo</code></p>
<!-- END_96bfc4b111af6ebb99a04da1f1d0ddbc -->
<!-- START_53d643dd8401faac55c9b06dc67adfad -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/especesAlgo/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/especesAlgo/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/especesAlgo/{especesAlgo}</code></p>
<!-- END_53d643dd8401faac55c9b06dc67adfad -->
<!-- START_a0f0125a8f6d08509c15a769724e26a1 -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/especesAlgo/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/especesAlgo/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/especesAlgo/{especesAlgo}/edit</code></p>
<!-- END_a0f0125a8f6d08509c15a769724e26a1 -->
<!-- START_2b3b58198f50e1733e6bfdbc815f8a03 -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/algorithme/especesAlgo/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/especesAlgo/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/algorithme/especesAlgo/{especesAlgo}</code></p>
<p><code>PATCH laboratoire/algorithme/especesAlgo/{especesAlgo}</code></p>
<!-- END_2b3b58198f50e1733e6bfdbc815f8a03 -->
<!-- START_bdaec3419312c74d4a2f93aedbb21d5d -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/algorithme/especesAlgo/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/especesAlgo/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/algorithme/especesAlgo/{especesAlgo}</code></p>
<!-- END_bdaec3419312c74d4a2f93aedbb21d5d -->
<!-- START_0e3ae494c0b40fca6c54e2928b935f5b -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/exclusions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/exclusions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/exclusions</code></p>
<!-- END_0e3ae494c0b40fca6c54e2928b935f5b -->
<!-- START_cd0e79656c96426cff34f7f9a7146973 -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/exclusions/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/exclusions/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/exclusions/create</code></p>
<!-- END_cd0e79656c96426cff34f7f9a7146973 -->
<!-- START_ef8bf6ecaf218b6e9b702e5b9f928f2e -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/algorithme/exclusions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/exclusions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/algorithme/exclusions</code></p>
<!-- END_ef8bf6ecaf218b6e9b702e5b9f928f2e -->
<!-- START_1a9192bb807b94c5b5a06016d91104f2 -->
<h2>Display the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/exclusions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/exclusions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/exclusions/{exclusion}</code></p>
<!-- END_1a9192bb807b94c5b5a06016d91104f2 -->
<!-- START_b24ce2a00f1795e9a50871526f929c37 -->
<h2>Show the form for editing the specified resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/exclusions/1/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/exclusions/1/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/exclusions/{exclusion}/edit</code></p>
<!-- END_b24ce2a00f1795e9a50871526f929c37 -->
<!-- START_bfcae6a4eb103b2e2b1b732cd9d398d2 -->
<h2>Update the specified resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X PUT \
    "https://parasitlab.org/laboratoire/algorithme/exclusions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/exclusions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "PUT",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>PUT laboratoire/algorithme/exclusions/{exclusion}</code></p>
<p><code>PATCH laboratoire/algorithme/exclusions/{exclusion}</code></p>
<!-- END_bfcae6a4eb103b2e2b1b732cd9d398d2 -->
<!-- START_6260e026a3535e12a3b6a7e45833549f -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/algorithme/exclusions/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/exclusions/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/algorithme/exclusions/{exclusion}</code></p>
<!-- END_6260e026a3535e12a3b6a7e45833549f -->
<!-- START_4ac05884224ac2755ee79eea8fed240e -->
<h2>laboratoire/algorithme/exclusion/destroyObservation/{observation_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/algorithme/exclusion/destroyObservation/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/exclusion/destroyObservation/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/algorithme/exclusion/destroyObservation/{observation_id}</code></p>
<!-- END_4ac05884224ac2755ee79eea8fed240e -->
<!-- START_42f5b6f2c8505faea099db82f3f47265 -->
<h2>laboratoire/algorithme/exclusion/destroyEspece/{observation_id}/{espece_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/algorithme/exclusion/destroyEspece/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/exclusion/destroyEspece/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/algorithme/exclusion/destroyEspece/{observation_id}/{espece_id}</code></p>
<!-- END_42f5b6f2c8505faea099db82f3f47265 -->
<!-- START_185791446c10948a6d0097f533484bac -->
<h2>laboratoire/algorithme/exclusion/destroyAge/{observation_id}/{age_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/algorithme/exclusion/destroyAge/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/exclusion/destroyAge/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/algorithme/exclusion/destroyAge/{observation_id}/{age_id}</code></p>
<!-- END_185791446c10948a6d0097f533484bac -->
<!-- START_5db15fe563202f62e5ec37c4b126573d -->
<h2>Display a listing of the resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/exclusionsAnaacte" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/exclusionsAnaacte"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/exclusionsAnaacte</code></p>
<!-- END_5db15fe563202f62e5ec37c4b126573d -->
<!-- START_4a0b472304cae58a52aa4f65688b9684 -->
<h2>Show the form for creating a new resource.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X GET \
    -G "https://parasitlab.org/laboratoire/algorithme/exclusionsAnaacte/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/exclusionsAnaacte/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<blockquote>
<p>Example response (302):</p>
</blockquote>
<pre><code class="language-json">null</code></pre>
<h3>HTTP Request</h3>
<p><code>GET laboratoire/algorithme/exclusionsAnaacte/create</code></p>
<!-- END_4a0b472304cae58a52aa4f65688b9684 -->
<!-- START_6eb4707e282dcbbcce9ee9fc33a409bd -->
<h2>Store a newly created resource in storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X POST \
    "https://parasitlab.org/laboratoire/algorithme/exclusionsAnaacte" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/exclusionsAnaacte"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>POST laboratoire/algorithme/exclusionsAnaacte</code></p>
<!-- END_6eb4707e282dcbbcce9ee9fc33a409bd -->
<!-- START_af701492ae9923469b1088d4ba8f35f2 -->
<h2>Remove the specified resource from storage.</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/algorithme/exclusionsAnaacte/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/exclusionsAnaacte/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/algorithme/exclusionsAnaacte/{exclusionsAnaacte}</code></p>
<!-- END_af701492ae9923469b1088d4ba8f35f2 -->
<!-- START_52d1cb25b80c85f45ead1447fe8dae03 -->
<h2>laboratoire/algorithme/exclusions/destroyObservation/{observation_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/algorithme/exclusions/destroyObservation/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/exclusions/destroyObservation/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/algorithme/exclusions/destroyObservation/{observation_id}</code></p>
<!-- END_52d1cb25b80c85f45ead1447fe8dae03 -->
<!-- START_b8e97af225ab4757ae068df0534bb25b -->
<h2>laboratoire/algorithme/exclusions/destroyEspece/{observation_id}/{espece_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/algorithme/exclusions/destroyEspece/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/exclusions/destroyEspece/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/algorithme/exclusions/destroyEspece/{observation_id}/{espece_id}</code></p>
<!-- END_b8e97af225ab4757ae068df0534bb25b -->
<!-- START_a2fe1dc27617b93b07254baab0a6fafd -->
<h2>laboratoire/algorithme/exclusions/destroyAge/{observation_id}/{age_id}</h2>
<blockquote>
<p>Example request:</p>
</blockquote>
<pre><code class="language-bash">curl -X DELETE \
    "https://parasitlab.org/laboratoire/algorithme/exclusions/destroyAge/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
<pre><code class="language-javascript">const url = new URL(
    "https://parasitlab.org/laboratoire/algorithme/exclusions/destroyAge/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
<h3>HTTP Request</h3>
<p><code>DELETE laboratoire/algorithme/exclusions/destroyAge/{observation_id}/{age_id}</code></p>
<!-- END_a2fe1dc27617b93b07254baab0a6fafd -->
      </div>
      <div class="dark-box">
                        <div class="lang-selector">
                                    <a href="#" data-language-name="bash">bash</a>
                                    <a href="#" data-language-name="javascript">javascript</a>
                              </div>
                </div>
    </div>
  </body>
</html>