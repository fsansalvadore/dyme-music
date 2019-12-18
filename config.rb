# Activate and configure extensions
# https://middlemanapp.com/advanced/configuration/#configuring-extensions

activate :autoprefixer do |prefix|
  prefix.browsers = "last 2 versions"
end

# ES6 support
::Sprockets::ES6.configure do |config|
  config.marshal_load({
    modules: 'amd',
    moduleIds: true
  })
end

# Layouts
# https://middlemanapp.com/basics/layouts/

# Per-page layout changes
page '/*.xml', layout: false
page '/*.json', layout: false
page '/*.txt', layout: false
page '/weddings/*', layout: 'eventspage'
page '/events/*', layout: 'eventspage'
page '/request/*', layout: 'form'
page '/not_found.html', layout: 'error'
page '/internal_server_error.html', layout: 'error'

# With alternative layout
# page '/path/to/file.html', layout: 'other_layout'

# Proxy pages
# https://middlemanapp.com/advanced/dynamic-pages/

# proxy(
#   '/this-page-has-no-template.html',
#   '/template-file.html',
#   locals: {
#     which_fake_page: 'Rendering a fake page with a local variable'
#   },
# )

configure :development do
  activate :livereload
  config[:host] = "http://localhost:4567"
end

# activate :directory_indexes

# Helpers
# Methods defined in the helpers block are available in templates
# https://middlemanapp.com/basics/helper-methods/

# helpers do
#   def some_helper
#     'Helping'
#   end
# end

# Build-specific configuration
# https://middlemanapp.com/advanced/configuration/#environment-specific-settings

configure :build do
  activate :gzip
  activate :minify_css
  activate :minify_javascript
  activate :asset_hash
  config[:host] = "http://www.dyme-music.com"
end

activate :s3_sync do |s3|
  s3.prefer_gzip = true
end
