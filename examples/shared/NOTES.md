# Shared Notes

All examples implement the same content lifecycle:
1. Create content (`POST /v1/cms/content`)
2. List content (`GET /v1/cms/content`)
3. Publish content (`POST /v1/cms/content/:id/publish`)

Common environment variables:
- `OCTAVIA_API_BASE_URL`
- `OCTAVIA_API_KEY`
- `OCTAVIA_PROJECT_ID`

Auth headers:
- `Authorization: Bearer <OCTAVIA_API_KEY>`
- `x-octavia-project-id: <OCTAVIA_PROJECT_ID>`
