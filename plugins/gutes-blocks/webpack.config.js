/**
 * Webpack configuration.
 */

const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const { CleanWebpackPlugin } = require("clean-webpack-plugin");
const CopyPlugin = require("copy-webpack-plugin");
const webpack = require("webpack");
const autoprefixer = require("autoprefixer");


// JS Directory path.
const JS_DIR = path.resolve(__dirname, "src") + "/js/";
const IMG_DIR = path.resolve(__dirname, "src") + "/img";
const BUILD_DIR = path.resolve(__dirname, "build");

const entry = {
  // blocks from other themes
  // caseStudyIntro: JS_DIR + "case-study-intro.js",
  // caseStudyArchive: JS_DIR + "case-study-archive.js",
  // textImage: JS_DIR + "text-image.js",
  // threeColumnLayout: JS_DIR + "three-column-layout.js",
  // relatedPosts: JS_DIR + "related-posts.js",
  // blogArchive: JS_DIR + "blog-archive.js",
  // textBulletPoints: JS_DIR + "text-bullet-points.js",
  // testimonials: JS_DIR + "testimonials.js",

  // catsSection: JS_DIR + "cats-section.js",

  // // CC specific blocks
  // faq: JS_DIR + "faq.js",
  // cover: JS_DIR + "cover.js",
  // textMedia: JS_DIR + "text-media.js",
  // mediaTextLinks: JS_DIR + "media-text-links.js",
  // iconAndText: JS_DIR + "icon-and-text.js",
 
  // sectionTitle: JS_DIR + "section-title.js",
  // steps: JS_DIR + "steps.js",
  // bullets: JS_DIR + "bullets.js",

  // reviews: JS_DIR + "reviews.js",
  // archive: JS_DIR + "archive.js",
  // imageLinks: JS_DIR + "image-links.js",
  // links: JS_DIR + "links.js",
  // colorSwatches: JS_DIR + "color-swatches.js",
};

const output = {
  path: BUILD_DIR,
  filename: "js/[name].js"
};

/**
 * Note: argv.mode will return 'development' or 'production'.
 */
const plugins = argv => {
  if("production" === argv.mode) {
    return [
      new CleanWebpackPlugin({
        cleanStaleWebpackAssets: "production" === argv.mode // Automatically remove all unused webpack assets on rebuild, when set to true in production. ( https://www.npmjs.com/package/clean-webpack-plugin#options-and-defaults-optional )
      }),

      new MiniCssExtractPlugin({
        filename: "css/[name].css"
      }),

      new webpack.LoaderOptionsPlugin({
        options: {
          postcss: [autoprefixer()]
        }
      })
    ]
  }
  else {
    return [
      new CleanWebpackPlugin({
        cleanStaleWebpackAssets: "production" === argv.mode // Automatically remove all unused webpack assets on rebuild, when set to true in production. ( https://www.npmjs.com/package/clean-webpack-plugin#options-and-defaults-optional )
      }),

      new MiniCssExtractPlugin({
        filename: "css/[name].css"
      }),

      new webpack.LoaderOptionsPlugin({
        options: {
          postcss: [autoprefixer()]
        }
      })
    ]
  }
};

const rules = [
  {
    test: /\.js$/,
    include: [JS_DIR],
    exclude: /node_modules/,
    use: "babel-loader"
  },
  {
    test: /\.scss$/,
    exclude: /node_modules/,
    use: [
      MiniCssExtractPlugin.loader,
      "css-loader",
      "postcss-loader",
      "sass-loader"
    ]
  },
  {
    test: /\.(png|jpg|svg|jpeg|gif|ico)$/,
    use: {
      loader: "file-loader",
      options: {
        name: "[path][name].[ext]",
        publicPath: "production" === process.env.NODE_ENV ? "../" : "../../"
      }
    }
  },
  {
    test: /\.(ttf|otf|eot|svg|woff(2)?)(\?[a-z0-9]+)?$/,
    exclude: [IMG_DIR, /node_modules/],
    use: {
      loader: "file-loader",
      options: {
        name: "[path][name].[ext]",
        publicPath: "production" === process.env.NODE_ENV ? "../" : "../../"
      }
    }
  }
];

/**
 * Since you may have to disambiguate in your webpack.config.js between development and production builds,
 * you can export a function from your webpack configuration instead of exporting an object
 *
 * @param {string} env environment ( See the environment options CLI documentation for syntax examples. https://webpack.js.org/api/cli/#environment-options )
 * @param argv options map ( This describes the options passed to webpack, with keys such as output-filename and optimize-minimize )
 * @return {{output: *, devtool: string, entry: *, optimization: {minimizer: [*, *]}, plugins: *, module: {rules: *}, externals: {jquery: string}}}
 *
 * @see https://webpack.js.org/configuration/configuration-types/#exporting-a-function
 */
module.exports = (env, argv) => ({
  entry: entry,
  stats: 'minimal',
  output: output,

  /**
   * A full SourceMap is emitted as a separate file ( e.g.  main.js.map )
   * It adds a reference comment to the bundle so development tools know where to find it.
   * set this to false if you don't need it
   */
  devtool: "source-map",

  module: {
    rules: rules
  },

  optimization: {
    minimizer: [
      `...`,
      new CssMinimizerPlugin()
    ]

  },

  plugins: plugins(argv),

  externals: {
    jquery: "jQuery"
  }
});
