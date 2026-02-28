import Link from "next/link";

export default function Home() {
  return (
    <main className="mx-auto max-w-3xl p-6">
      <h1 className="mb-4 text-3xl font-bold">Octavia CMS - Next.js Example</h1>
      <p className="mb-6 text-slate-400">
        This example has two pages: blog and forms.
      </p>
      <div className="flex gap-3">
        <Link className="rounded bg-cyan-500 px-4 py-2 font-medium text-slate-950" href="/blog">
          Go to Blog Page
        </Link>
        <Link className="rounded bg-slate-800 px-4 py-2 font-medium" href="/forms">
          Go to Form Page
        </Link>
      </div>
    </main>
  );
}

