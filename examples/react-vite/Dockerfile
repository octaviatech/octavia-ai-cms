# NOTE: the built bundle is static and has no server-side code, because the
# Octavia API key only ever exists in the dev-server proxy (see
# `server/octaviaProxy.ts`). The proxy is not shipped in this image, so a
# production deployment must front this bundle with its own server-side proxy
# before it is of any use.
FROM node:lts-alpine AS builder

ENV NODE_OPTIONS=--max_old_space_size=4096

WORKDIR /app

# Copy package files
COPY package.json .
COPY package-lock.json* ./

# Install dependencies
RUN npm install --legacy-peer-deps --force

# Copy the rest of the application code
COPY . .

# Build the application
RUN npm run build

FROM nginx:1.23.3-alpine AS production
ENV NODE_ENV=production
COPY --from=builder /app/dist /usr/share/nginx/html

EXPOSE 3000

CMD ["nginx", "-g", "daemon off;"]
