<script>
    import { createClient } from '@supabase/supabase-js'
    import { onMount } from 'svelte'
  
    const client = createClient(
      import.meta.env.VITE_SUPABASE_URL,
      import.meta.env.VITE_SUPABASE_KEY
    )
    const channel = client.channel('my-topic')
      .on('postgres_changes',
      {
        event: '*',
        schema: 'public',
        table: 'users',
      },
      () => fetchUpdated()
    ).subscribe()
    console.log(channel)
  
    let users = [];
  
    async function fetchUpdated() {
      const { data } = await client
          .from('users')
          .select('id, name, status')
          .order('id', { ascending: true })
      users = data;
    }
  
    onMount(fetchUpdated)
  
  </script>
  
  <div class="flex flex-col min-h-screen w-full items-center justify-top bg-gray-100 dark:bg-gray-700">
    <h1 class="p-2 text-gray-800 dark:text-gray-200 text-3xl">みんなの状況</h1>
    <div class="px-2 w-full sm:w-1/2 md:w-1/3">
      <div class="flex p-2 gap-4 border border-blue-400 justify-around">
        <h3 class="text-gray-600 dark:text-gray-200 text-lg">名前</h3>
        <p class="text-gray-600 dark:text-gray-200 text-lg">状況</p>
      </div>
      {#each users as user (user.id)}
        <div class="flex p-2 gap-4 border border-gray-400 justify-around">
          <h3 class="text-gray-800 dark:text-gray-200">{user.name}</h3>
          <h3 class="text-gray-800 dark:text-gray-200">
            {#if user.status == 'free'}
                フリー👍
            {:else if user.status == 'busy'}
                対応中💦
            {:else if user.status == 'vip'}
                VIP👑
            {:else}
                未設定
            {/if}
          </h3>
        </div>
      {/each}
    </div>
 </div>
