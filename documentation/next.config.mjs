import { createMDX } from 'fumadocs-mdx/next';

const withMDX = createMDX();

/** @type {import('next').NextConfig} */
const config = {
  output: "export", // <=== enables static exports
  basePath: "/fleekdash-v2",
  reactStrictMode: true,
};

export default withMDX(config);
