<template>
  <main class="mx-auto max-w-3xl p-6">
    <h1 class="mb-4 text-3xl font-bold">Octavia CMS - Nuxt</h1>
    <p class="mb-6 text-slate-400">
      This example has two pages: blog and forms.
    </p>
    <div class="flex gap-3">
      <NuxtLink class="rounded bg-cyan-500 px-4 py-2 font-medium text-slate-950" to="/blog">
        Go to Blog Page
      </NuxtLink>
      <NuxtLink class="rounded bg-slate-800 px-4 py-2 font-medium" to="/forms">
        Go to Form Page
      </NuxtLink>
    </div>
  </main>
</template>

