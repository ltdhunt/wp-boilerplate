"use client"
import { useRef, useEffect } from 'react';
import { startPlaygroundWeb } from '@wp-playground/client';
import Link from 'next/link';

export default function PreviewPage() {
  const wpPlayground = useRef<HTMLIFrameElement>(null);

  useEffect(() => {
    if (wpPlayground.current) {
      const client = startPlaygroundWeb({
        iframe: wpPlayground.current,
        remoteUrl: `https://playground.wordpress.net/remote.html`,
        blueprint: {
          landingPage: '/wp-admin/admin.php?page=fleekdash-v2#/dashboard',
          preferredVersions: {
            php: '8.3',
            wp: 'latest',
          },
          features: {
            networking: true,
          },
          steps: [
            {
              step: 'login',
              username: 'admin',
              password: 'password',
            },
            {
              step: 'installPlugin',
              pluginZipFile: {
                resource: 'url',
                url: 'https://github.com/prappo/fleekdash-v2/raw/refs/heads/main/documentation/public/plugin/fleekdash-v2.zip',
              },
            },
          ],
        },
      });

      client.catch((error) => {
        console.log('Error starting WordPress Playground:', error);
      });
    }
  }, [wpPlayground.current]);

  return (
    <div className="flex flex-col h-screen">
      <div className="p-4 flex justify-between items-center bg-gray-100">
        <h2 className="text-xl font-bold">WordPress Plugin Boilerplate Preview</h2>
        <Link href="/" className="bg-blue-500 text-white px-4 py-2 rounded-md">Back to Home</Link>
      </div>
      <iframe ref={wpPlayground} className="flex-grow w-full"></iframe>
    </div>
  );
}
