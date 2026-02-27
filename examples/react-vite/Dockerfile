FROM node:lts-alpine AS base

ENV NODE_OPTIONS=--max_old_space_size=4096

WORKDIR /app

# Copy package files
COPY package.json .
COPY package-lock.json .

# Install dependencies
RUN npm install --legacy-peer-deps --force

# Copy the rest of the application code
COPY . .

# Build the application
RUN npm run build

FROM nginx:1.23.3-alpine AS production
ENV NODE_ENV=production
COPY --from=builder /app/dist /usr/share/nginx/html
COPY nginx.conf /etc/nginx/conf.d/default.conf

EXPOSE 3000

CMD ["nginx", "-g", "daemon off;"]