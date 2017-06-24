# Furqan API

This is REST API for retrieving data of The Holy Quran. Built on Laravel PHP framework

## API

You should use following URL template for accessing data:

`{SITE_DOMAIN}/api/{RESOURCE}?{PARAMETER_KEY}={PARAMETER_VALUE}`

### Supported resources and parameters

| Resource | Parameters   |
|----------|--------------|
|  ayat    | surat_number, limit, offset |